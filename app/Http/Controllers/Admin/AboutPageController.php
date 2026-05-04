<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::with('media')->latest()->first();

        if (!$aboutPage) {
            $aboutPage = AboutPage::create([
                'hero_eyebrow'          => 'About Meraki Foils',
                'hero_title'            => 'Industry-recognised',
                'hero_highlight'        => 'aluminium foil specialists.',
                'hero_description'      => 'With decades in aluminium converting, we support pharma, food, dairy, cosmetics and confectionery brands with foils that protect what matters and arrive when promised.',
                'hero_chips'            => 'Commercial & Industrial, Pharmaceutical, Food & Dairy',
                'hero_stat_1_value'     => '50+',
                'hero_stat_1_label'     => 'Years of know-how*',
                'hero_stat_2_value'     => '250+',
                'hero_stat_2_label'     => 'Active SKUs',
                'hero_stat_3_value'     => '99.5%',
                'hero_stat_3_label'     => 'On-time delivery',
                'hero_footnote'         => '*Cumulative industry experience across leadership & core team.',
                'hero_tag_1'            => 'cGMP-aligned handling',
                'hero_tag_2'            => 'Continuous improvement mindset',

                'journey_eyebrow'       => 'Our journey',
                'journey_title'         => 'From a single line to a full-spectrum foil partner.',
                'journey_description_1' => 'Meraki Foils evolved from a focused aluminium operation into a partner of choice for demanding customers who expect consistent quality, stable supply, and responsive service.',
                'journey_description_2' => 'Over the years, we’ve added capacity, upgraded equipment and refined our processes—always with one goal: reliable packaging that protects your product and your reputation.',

                'mission_eyebrow'       => 'Mission',
                'mission_title'         => 'Empowering industries with reliable foil solutions.',
                'mission_description'   => 'Our mission is to provide aluminium foil structures that elevate packaging performance, product safety and shelf appeal—backed by responsive service and clear technical support.',
                'mission_points'        => 'Deliver consistent quality across microns tempers coatings and laminates, Support customers with fast sampling clear documentation and on-time deliveries, Continuously improve processes based on data and customer feedback',

                'vision_eyebrow'        => 'Vision',
                'vision_title'          => 'Redefining foil packaging for a sustainable future.',
                'vision_description'    => 'We aim to be at the forefront of eco-conscious aluminium solutions—where performance, safety and sustainability move forward together.',
                'vision_points'         => 'Recyclability-first thinking, Lower energy and waste, Responsible sourcing, Long-term partnerships',

                'why_eyebrow'           => 'Why Meraki Foils',
                'why_title'             => 'Why customers keep coming back.',
                'why_description'       => 'We don’t just ship rolls—we help you select the right foil for your forming, sealing and barrier needs, then keep your lines running with dependable supply.',
                'why_micro_points'      => 'Trusted by leading pharma and FMCG brands, Focus on uptime and continuity',

                'cta_title'             => 'Looking for a new foil partner?',
                'cta_description'       => 'Share your application and current spec, and we’ll help you evaluate options on barrier, machinability and total cost-in-use.',
                'cta_button_text'       => 'Share your spec',
                'cta_button_link'       => 'index.html#rfq',
                'status'                => 1,
            ]);
        }

        return view('admin.about-pages.index', compact('aboutPage'));
    }

    public function create()
    {
        return redirect()->route('admin.about-pages.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.about-pages.index');
    }

    public function show(AboutPage $aboutPage)
    {
        $aboutPage->load('media');

        return view('admin.about-pages.show', compact('aboutPage'));
    }

    public function edit(AboutPage $aboutPage)
    {
        $aboutPage->load('media');

        return view('admin.about-pages.edit', compact('aboutPage'));
    }

    public function update(Request $request, AboutPage $aboutPage)
    {
        $request->validate([
            'hero_eyebrow'          => 'nullable|string|max:255',
            'hero_title'            => 'nullable|string|max:255',
            'hero_highlight'        => 'nullable|string|max:255',
            'hero_description'      => 'nullable|string',
            'hero_chips'            => 'nullable|string',

            'hero_stat_1_value'     => 'nullable|string|max:255',
            'hero_stat_1_label'     => 'nullable|string|max:255',
            'hero_stat_2_value'     => 'nullable|string|max:255',
            'hero_stat_2_label'     => 'nullable|string|max:255',
            'hero_stat_3_value'     => 'nullable|string|max:255',
            'hero_stat_3_label'     => 'nullable|string|max:255',
            'hero_footnote'         => 'nullable|string',
            'hero_tag_1'            => 'nullable|string|max:255',
            'hero_tag_2'            => 'nullable|string|max:255',

            'journey_eyebrow'       => 'nullable|string|max:255',
            'journey_title'         => 'nullable|string|max:255',
            'journey_description_1' => 'nullable|string',
            'journey_description_2' => 'nullable|string',

            'mission_eyebrow'       => 'nullable|string|max:255',
            'mission_title'         => 'nullable|string|max:255',
            'mission_description'   => 'nullable|string',
            'mission_points'        => 'nullable|string',

            'vision_eyebrow'        => 'nullable|string|max:255',
            'vision_title'          => 'nullable|string|max:255',
            'vision_description'    => 'nullable|string',
            'vision_points'         => 'nullable|string',

            'why_eyebrow'           => 'nullable|string|max:255',
            'why_title'             => 'nullable|string|max:255',
            'why_description'       => 'nullable|string',
            'why_micro_points'      => 'nullable|string',

            'cta_title'             => 'nullable|string|max:255',
            'cta_description'       => 'nullable|string',
            'cta_button_text'       => 'nullable|string|max:255',
            'cta_button_link'       => 'nullable|string|max:255',

            'status'                => 'nullable|boolean',
            'hero_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $aboutPage->update([
            'hero_eyebrow'          => $request->hero_eyebrow,
            'hero_title'            => $request->hero_title,
            'hero_highlight'        => $request->hero_highlight,
            'hero_description'      => $request->hero_description,
            'hero_chips'            => $request->hero_chips,

            'hero_stat_1_value'     => $request->hero_stat_1_value,
            'hero_stat_1_label'     => $request->hero_stat_1_label,
            'hero_stat_2_value'     => $request->hero_stat_2_value,
            'hero_stat_2_label'     => $request->hero_stat_2_label,
            'hero_stat_3_value'     => $request->hero_stat_3_value,
            'hero_stat_3_label'     => $request->hero_stat_3_label,
            'hero_footnote'         => $request->hero_footnote,
            'hero_tag_1'            => $request->hero_tag_1,
            'hero_tag_2'            => $request->hero_tag_2,

            'journey_eyebrow'       => $request->journey_eyebrow,
            'journey_title'         => $request->journey_title,
            'journey_description_1' => $request->journey_description_1,
            'journey_description_2' => $request->journey_description_2,

            'mission_eyebrow'       => $request->mission_eyebrow,
            'mission_title'         => $request->mission_title,
            'mission_description'   => $request->mission_description,
            'mission_points'        => $request->mission_points,

            'vision_eyebrow'        => $request->vision_eyebrow,
            'vision_title'          => $request->vision_title,
            'vision_description'    => $request->vision_description,
            'vision_points'         => $request->vision_points,

            'why_eyebrow'           => $request->why_eyebrow,
            'why_title'             => $request->why_title,
            'why_description'       => $request->why_description,
            'why_micro_points'      => $request->why_micro_points,

            'cta_title'             => $request->cta_title,
            'cta_description'       => $request->cta_description,
            'cta_button_text'       => $request->cta_button_text,
            'cta_button_link'       => $request->cta_button_link,

            'status'                => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('hero_image')) {
            $aboutPage
                ->addMediaFromRequest('hero_image')
                ->toMediaCollection('about_hero_image');
        }

        return redirect()
            ->route('admin.about-pages.index')
            ->with('success', 'About page updated successfully.');
    }

    public function destroy(AboutPage $aboutPage)
    {
        return redirect()
            ->route('admin.about-pages.index')
            ->with('success', 'About page cannot be deleted. You can update it instead.');
    }
}