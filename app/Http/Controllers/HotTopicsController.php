<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotTopicsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $topicsData = collect([
            ['title' => 'Compliance Challenges Framework Model', 'route' => 'compliance-challenges'],
            ['title' => 'Key Performance Indicator vs Key Risk Indicator', 'route' => 'key-performance-indicator'],
            ['title' => 'Essential KPIs & KRIs', 'route' => 'essential-kpis-kris'],
            ['title' => 'Risk Management Methodologies', 'route' => 'risk-management-methodologies'],
            ['title' => 'Control Assessment vs Risk Assessment', 'route' => 'control-assessment-risk-assessment'],
            ['title' => '26 Essential Items Checklist of Awarness Topics', 'route' => '26-essential-items'],
            ['title' => 'Enhancing Staff Knowledge & Skill', 'route' => 'enhancing-staff-knowledge'],
            ['title' => 'Asset Inventory vs Configuration Management Database', 'route' => 'asset-inventory'],
            ['title' => 'Essential and Practical Cryptographic Deployment', 'route' => 'essential-practical-cryptographic'],
            ['title' => 'Data & Information', 'route' => 'data-information'],
            ['title' => 'Selecting VA & Pen Tester', 'route' => 'selecting-va-pen-tester'],
            ['title' => 'Incident Management vs Cybersecurity Incident Management', 'route' => 'incident-management'],
            ['title' => 'Review vs Audit', 'route' => 'review-vs-audit'],
        ]);

        return view('ciso/hot-topics/index', compact('topicsData'));
    }
}
