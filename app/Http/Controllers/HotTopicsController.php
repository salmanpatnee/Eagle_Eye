<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotTopicsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $topicsData = [
            'Compliance Challenges Framework Model' => 'compliance-challenges',
            'Key Performance Indicator vs Key Risk Indicator' => 'key-performance-indicator',
            'Essential KPIs & KRIs' => 'essential-kpis-kris',
            'Risk Management Methodologies' => 'risk-management-methodologies',
            'Control Assessment vs Risk Assessment' => 'control-assessment-risk-assessment',
            '26 Essential Items Checklist of Awarness Topics' => '26-essential-items',
            'Enhancing Staff Knowledge & Skill' => 'enhancing-staff-knowledge',
            'Asset Inventory vs Configuration Management Database' => 'asset-inventory',
            'Essential and Practical Cryptographic Deployment' => 'essential-practical-cryptographic',
            'Data & Information' => 'data-information',
            'Selecting VA & Pen Tester' => 'selecting-va-pen-tester',
            'Incident Management vs Cybersecurity Incident Management' => 'incident-management',
            'Review vs Audit' => 'review-vs-audit',
        ];

        return view('ciso/hot-topics/index', compact('topicsData'));
    }
}
