@extends('frontend.master')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<div class="auth-page">
    <div class="auth-bg-shape auth-bg-shape-1"></div>
    <div class="auth-bg-shape auth-bg-shape-2"></div>

    <div class="auth-shell">

        <div class="auth-brand-panel">
            <div class="auth-brand-content">
                <div class="auth-logo-badge">
                    <i class="fas fa-layer-group"></i>
                </div>

                <h1>
                    {{ trans('panel.site_title') }}
                </h1>

                <p>
                    Manage products, resources, enquiries, partners and website content from one premium dashboard.
                </p>

                <div class="auth-feature-list">
                    <div>
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure Admin Access</span>
                    </div>

                    <div>
                        <i class="fas fa-chart-line"></i>
                        <span>Dynamic Website Control</span>
                    </div>

                    <div>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Enquiry Management</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-card">

            <div class="auth-card-head">
                <div class="auth-mini-icon">
                    <i class="fas fa-user-lock"></i>
                </div>

                <h2>
                    Welcome Back
                </h2>

                <p>
                    Login to continue to your admin panel.
                </p>
            </div>

            @if(session('message'))
                <div class="auth-alert auth-alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="email">
                        {{ trans('global.login_email') }}
                    </label>

                    <div class="auth-input-wrap {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        <i class="fas fa-envelope"></i>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="Enter your email">
                    </div>

                    @if($errors->has('email'))
                        <p class="auth-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="auth-field">
                    <label for="password">
                        {{ trans('global.login_password') }}
                    </label>

                    <div class="auth-input-wrap {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <i class="fas fa-lock"></i>

                        <input type="password"
                               id="password"
                               name="password"
                               required
                               placeholder="Enter your password">
                    </div>

                    @if($errors->has('password'))
                        <p class="auth-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="auth-row">
                    <label class="auth-checkbox">
                        <input type="checkbox" name="remember">
                        <span></span>
                        {{ trans('global.remember_me') }}
                    </label>

                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link">
                            {{ trans('global.forgot_password') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="auth-submit">
                    <i class="fas fa-sign-in-alt"></i>
                    {{ trans('global.login') }}
                </button>

                @if(Route::has('register'))
                    <div class="auth-register">
                        <span>Don’t have an account?</span>
                        <a href="{{ route('register') }}">
                            {{ trans('global.register') }}
                        </a>
                    </div>
                @endif

            </form>
        </div>
    </div>
</div>

<style>
    * {
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .auth-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 28px;
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at top left, rgba(79, 70, 229, 0.18), transparent 32%),
            radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.14), transparent 34%),
            linear-gradient(135deg, #F8FAFC 0%, #EEF2FF 45%, #F8FAFC 100%);
    }

    .auth-page::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(15, 23, 42, 0.035) 1px, transparent 1px),
            linear-gradient(90deg, rgba(15, 23, 42, 0.035) 1px, transparent 1px);
        background-size: 44px 44px;
        pointer-events: none;
        opacity: 0.75;
    }

    .auth-bg-shape {
        position: absolute;
        border-radius: 999px;
        filter: blur(6px);
        opacity: 0.6;
        pointer-events: none;
    }

    .auth-bg-shape-1 {
        width: 280px;
        height: 280px;
        background: rgba(79, 70, 229, 0.16);
        top: -90px;
        right: 8%;
    }

    .auth-bg-shape-2 {
        width: 220px;
        height: 220px;
        background: rgba(16, 185, 129, 0.13);
        bottom: -70px;
        left: 7%;
    }

    .auth-shell {
        width: min(1080px, 100%);
        min-height: 620px;
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.74);
        border: 1px solid rgba(226, 232, 240, 0.95);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 28px 80px rgba(15, 23, 42, 0.16);
        backdrop-filter: blur(18px);
    }

    .auth-brand-panel {
        position: relative;
        overflow: hidden;
        color: #fff;
        background:
            radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.24), transparent 28%),
            linear-gradient(135deg, #4F46E5 0%, #3730A3 48%, #0F172A 100%);
        padding: 54px;
        display: flex;
        align-items: center;
    }

    .auth-brand-panel::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1px, transparent 1px);
        background-size: 42px 42px;
        opacity: 0.55;
    }

    .auth-brand-panel::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.10);
        right: -90px;
        bottom: -90px;
    }

    .auth-brand-content {
        position: relative;
        z-index: 1;
        max-width: 440px;
    }

    .auth-logo-badge {
        width: 64px;
        height: 64px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.16);
        border: 1px solid rgba(255, 255, 255, 0.24);
        color: #fff;
        font-size: 26px;
        margin-bottom: 24px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.18);
    }

    .auth-brand-content h1 {
        font-size: clamp(32px, 4vw, 48px);
        line-height: 1.05;
        font-weight: 800;
        margin: 0 0 16px;
        letter-spacing: -0.04em;
    }

    .auth-brand-content p {
        font-size: 15px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.78);
        margin: 0;
    }

    .auth-feature-list {
        margin-top: 32px;
        display: grid;
        gap: 12px;
    }

    .auth-feature-list div {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: 16px;
        color: rgba(255, 255, 255, 0.92);
        background: rgba(255, 255, 255, 0.11);
        border: 1px solid rgba(255, 255, 255, 0.16);
        backdrop-filter: blur(10px);
        font-size: 13px;
        font-weight: 700;
    }

    .auth-feature-list i {
        color: #A7F3D0;
    }

    .auth-card {
        padding: 54px 48px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: rgba(255, 255, 255, 0.9);
    }

    .auth-card-head {
        text-align: center;
        margin-bottom: 28px;
    }

    .auth-mini-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 16px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #EEF2FF;
        color: #4F46E5;
        font-size: 22px;
        box-shadow: 0 16px 35px rgba(79, 70, 229, 0.16);
    }

    .auth-card-head h2 {
        font-size: 28px;
        line-height: 1.2;
        color: #0F172A;
        font-weight: 800;
        margin: 0;
        letter-spacing: -0.035em;
    }

    .auth-card-head p {
        margin: 8px 0 0;
        color: #64748B;
        font-size: 14px;
    }

    .auth-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 14px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .auth-alert-info {
        background: #EFF6FF;
        color: #1D4ED8;
        border: 1px solid #BFDBFE;
    }

    .auth-form {
        display: grid;
        gap: 18px;
    }

    .auth-field label {
        display: block;
        font-size: 13px;
        font-weight: 800;
        color: #334155;
        margin-bottom: 8px;
    }

    .auth-input-wrap {
        height: 50px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 15px;
        border-radius: 15px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        color: #94A3B8;
        transition: 0.25s ease;
    }

    .auth-input-wrap:focus-within {
        border-color: #4F46E5;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.10);
        color: #4F46E5;
    }

    .auth-input-wrap.is-invalid {
        border-color: #EF4444;
        background: #FEF2F2;
    }

    .auth-input-wrap input {
        width: 100%;
        height: 100%;
        border: 0;
        outline: 0;
        background: transparent;
        color: #0F172A;
        font-size: 14px;
        font-weight: 600;
    }

    .auth-input-wrap input::placeholder {
        color: #94A3B8;
        font-weight: 500;
    }

    .auth-error {
        margin: 7px 0 0;
        font-size: 12px;
        color: #DC2626;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .auth-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        flex-wrap: wrap;
    }

    .auth-checkbox {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: 13px;
        font-weight: 700;
        color: #64748B;
        cursor: pointer;
        user-select: none;
    }

    .auth-checkbox input {
        display: none;
    }

    .auth-checkbox span {
        width: 18px;
        height: 18px;
        border-radius: 6px;
        border: 1.6px solid #CBD5E1;
        background: #fff;
        position: relative;
        transition: 0.2s ease;
    }

    .auth-checkbox input:checked + span {
        border-color: #4F46E5;
        background: #4F46E5;
    }

    .auth-checkbox input:checked + span::after {
        content: "✓";
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 12px;
        font-weight: 900;
    }

    .auth-link {
        font-size: 13px;
        color: #4F46E5;
        font-weight: 800;
        text-decoration: none;
    }

    .auth-link:hover {
        text-decoration: underline;
    }

    .auth-submit {
        height: 52px;
        border: 0;
        cursor: pointer;
        border-radius: 16px;
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        background: linear-gradient(135deg, #4F46E5 0%, #3730A3 100%);
        box-shadow: 0 18px 35px rgba(79, 70, 229, 0.24);
        transition: 0.25s ease;
    }

    .auth-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 24px 45px rgba(79, 70, 229, 0.30);
    }

    .auth-register {
        text-align: center;
        color: #64748B;
        font-size: 13px;
        font-weight: 600;
        padding-top: 6px;
    }

    .auth-register a {
        color: #4F46E5;
        font-weight: 800;
        text-decoration: none;
        margin-left: 4px;
    }

    .auth-register a:hover {
        text-decoration: underline;
    }

    @media (max-width: 900px) {
        .auth-shell {
            grid-template-columns: 1fr;
            max-width: 520px;
        }

        .auth-brand-panel {
            padding: 34px;
        }

        .auth-brand-content h1 {
            font-size: 32px;
        }

        .auth-feature-list {
            grid-template-columns: 1fr;
        }

        .auth-card {
            padding: 38px 28px;
        }
    }

    @media (max-width: 480px) {
        .auth-page {
            padding: 16px;
        }

        .auth-shell {
            border-radius: 22px;
        }

        .auth-brand-panel {
            display: none;
        }

        .auth-card {
            padding: 34px 22px;
        }

        .auth-card-head h2 {
            font-size: 24px;
        }

        .auth-row {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

@endsection