<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use App\Models\AboutPage;
use App\Models\AboutTimeline;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::with('media')
            ->active()
            ->latest()
            ->first();

        if (!$aboutPage) {
            $aboutPage = new AboutPage([
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
            ]);
        }

        $timelines = AboutTimeline::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $features = AboutFeature::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.about', compact(
            'aboutPage',
            'timelines',
            'features'
        ));
    }
}