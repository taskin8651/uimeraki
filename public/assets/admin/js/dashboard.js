let lineChart = null;
let doughnutChart = null;

document.addEventListener('DOMContentLoaded', function () {
    initDashboardCharts();
    restoreDashboardTheme();
    bindOutsideThemeClose();
});

function getAccentColor() {
    return getComputedStyle(document.documentElement).getPropertyValue('--accent').trim() || '#4F46E5';
}

function initDashboardCharts() {
    const data = window.dashboardData || {};
    const accentColor = getAccentColor();

    const lineCanvas = document.getElementById('lineChart');
    const doughnutCanvas = document.getElementById('doughnutChart');

    if (lineCanvas) {
        const lineCtx = lineCanvas.getContext('2d');

        lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: data.lineLabels || ['Users', 'Products', 'Resources', 'Enquiries', 'Partners'],
                datasets: [{
                    label: 'Count',
                    data: data.lineValues || [0, 0, 0, 0, 0],
                    borderColor: accentColor,
                    backgroundColor: accentColor + '1A',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.45,
                    pointBackgroundColor: accentColor,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#9CA3AF'
                        }
                    },
                    y: {
                        grid: {
                            color: '#F3F4F6'
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#9CA3AF'
                        }
                    }
                }
            }
        });
    }

    if (doughnutCanvas) {
        const roleColors = ['#4F46E5', '#0EA5E9', '#10B981', '#F59E0B', '#EF4444'];
        const labels = data.chartLabels || ['Users', 'Products', 'Resources', 'Enquiries', 'Partners'];
        const values = data.chartValues || [0, 0, 0, 0, 0];

        const dCtx = doughnutCanvas.getContext('2d');

        doughnutChart = new Chart(dCtx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: roleColors,
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                cutout: '68%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: ctx => ` ${ctx.label}: ${ctx.parsed}`
                        }
                    }
                }
            }
        });

        renderDoughnutLegend(labels, values, roleColors);
    }
}

function renderDoughnutLegend(labels, values, colors) {
    const legendEl = document.getElementById('doughnut-legend');

    if (!legendEl) {
        return;
    }

    legendEl.innerHTML = '';

    labels.forEach((label, index) => {
        legendEl.innerHTML += `
            <div class="doughnut-legend-item">
                <span class="doughnut-dot" style="background:${colors[index]};"></span>
                <span class="doughnut-label">${label}</span>
                <span class="doughnut-value">${values[index]}</span>
            </div>
        `;
    });
}

function setCSSVar(name, val) {
    document.documentElement.style.setProperty(name, val);
}

function setAccent(el) {
    document.querySelectorAll('.color-swatch').forEach(swatch => {
        swatch.classList.remove('active');
    });

    el.classList.add('active');

    const accent = el.dataset.accent;
    const light = el.dataset.light;
    const dark = el.dataset.dark;

    setCSSVar('--accent', accent);
    setCSSVar('--accent-light', light);
    setCSSVar('--accent-dark', dark);

    const customColor = document.getElementById('custom-color');
    const hexDisplay = document.getElementById('hex-display');

    if (customColor) {
        customColor.value = accent;
    }

    if (hexDisplay) {
        hexDisplay.textContent = accent.toUpperCase();
    }

    updateChartColors(accent);
    saveTheme();
}

function applyCustomColor(hex) {
    document.querySelectorAll('.color-swatch').forEach(swatch => {
        swatch.classList.remove('active');
    });

    const hexDisplay = document.getElementById('hex-display');

    if (hexDisplay) {
        hexDisplay.textContent = hex.toUpperCase();
    }

    setCSSVar('--accent', hex);
    setCSSVar('--accent-light', hex + '1A');
    setCSSVar('--accent-dark', hex);

    updateChartColors(hex);
    saveTheme();
}

function updateChartColors(color) {
    if (lineChart) {
        lineChart.data.datasets[0].borderColor = color;
        lineChart.data.datasets[0].backgroundColor = color + '1A';
        lineChart.data.datasets[0].pointBackgroundColor = color;
        lineChart.update();
    }
}

const bgMap = {
    'bg-gray-100': '#F3F4F6',
    'bg-white': '#FFFFFF',
    'bg-slate-800': '#1E293B',
    'bg-blue-50': '#EFF6FF'
};

function setBg(cls) {
    const mainEl = document.querySelector('body > .flex.min-h-screen > .flex-1');

    if (mainEl) {
        mainEl.style.background = bgMap[cls] || '#F3F4F6';
    }

    document.querySelectorAll('.theme-bg-btn').forEach(btn => {
        btn.classList.remove('active-bg');
        btn.style.borderColor = '#E5E7EB';
    });

    let id = 'bg-gray';

    if (cls === 'bg-white') {
        id = 'bg-white';
    } else if (cls === 'bg-slate-800') {
        id = 'bg-dark';
    } else if (cls === 'bg-blue-50') {
        id = 'bg-blue';
    }

    const activeBtn = document.getElementById(id);

    if (activeBtn) {
        activeBtn.classList.add('active-bg');
        activeBtn.style.borderColor = 'var(--accent)';
    }

    localStorage.setItem('dash_bg', cls);
}

function setSize(size) {
    const sizes = {
        compact: '13px',
        default: '14px',
        spacious: '15px'
    };

    document.documentElement.style.fontSize = sizes[size] || '14px';

    document.querySelectorAll('.theme-size-row button').forEach(btn => {
        btn.classList.remove('active-size');
    });

    const buttons = document.querySelectorAll('.theme-size-row button');

    if (size === 'compact' && buttons[0]) {
        buttons[0].classList.add('active-size');
    }

    if (size === 'default' && buttons[1]) {
        buttons[1].classList.add('active-size');
    }

    if (size === 'spacious' && buttons[2]) {
        buttons[2].classList.add('active-size');
    }

    localStorage.setItem('dash_size', size);
}

function toggleTheme() {
    const panel = document.getElementById('theme-panel');

    if (panel) {
        panel.classList.toggle('open');
    }
}

function resetTheme() {
    setCSSVar('--accent', '#4F46E5');
    setCSSVar('--accent-light', '#EEF2FF');
    setCSSVar('--accent-dark', '#3730A3');

    updateChartColors('#4F46E5');

    const customColor = document.getElementById('custom-color');
    const hexDisplay = document.getElementById('hex-display');

    if (customColor) {
        customColor.value = '#4F46E5';
    }

    if (hexDisplay) {
        hexDisplay.textContent = '#4F46E5';
    }

    document.querySelectorAll('.color-swatch').forEach((swatch, index) => {
        if (index === 0) {
            swatch.classList.add('active');
        } else {
            swatch.classList.remove('active');
        }
    });

    setBg('bg-gray-100');
    setSize('default');

    localStorage.removeItem('dash_theme');
    localStorage.removeItem('dash_bg');
    localStorage.removeItem('dash_size');
}

function saveTheme() {
    const theme = {
        accent: getComputedStyle(document.documentElement).getPropertyValue('--accent').trim()
    };

    localStorage.setItem('dash_theme', JSON.stringify(theme));
}

function restoreDashboardTheme() {
    const saved = localStorage.getItem('dash_theme');

    if (saved) {
        try {
            const theme = JSON.parse(saved);

            if (theme.accent) {
                applyCustomColor(theme.accent.trim());
            }
        } catch (e) {}
    }

    const savedBg = localStorage.getItem('dash_bg');

    if (savedBg) {
        setBg(savedBg);
    }

    const savedSize = localStorage.getItem('dash_size');

    if (savedSize) {
        setSize(savedSize);
    }
}

function bindOutsideThemeClose() {
    document.addEventListener('click', function (e) {
        const panel = document.getElementById('theme-panel');
        const btn = document.getElementById('theme-toggle-btn');

        if (!panel || !btn) {
            return;
        }

        if (panel.classList.contains('open') && !panel.contains(e.target) && e.target !== btn && !btn.contains(e.target)) {
            panel.classList.remove('open');
        }
    });
}