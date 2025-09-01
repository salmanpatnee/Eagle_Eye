<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $productsData = [
            'Anti Phishing Software' => 'products.anti-phishing-software',
            'Anti Ransomware Software' => 'products.anti-ransomware-software',
            'Application Whitelisting' => 'products.application-whitelisting',
            'Backup Recovery' => 'products.backup-recovery',
            'Brand Protection' => 'products.brand-protection',
            'Casb' => 'products.casb',
            'Container Kubernetes Security' => 'products.container-kubernetes-security',
            'Data Classification' => 'products.data-classification',
            'Data Loss Prevention' => 'products.data-loss-prevention',
            'Database Activity Monitoring' => 'products.database-activity-monitoring',
            'Distributed Denial Of Service Of Attack' => 'products.distributed-denial-of-service-of-attack',
            'Email Security' => 'products.email-security',
            'Encryption' => 'products.encryption',
            'End Point Detection Response' => 'products.end-point-detection-response',
            'Extended Detection Protection Response' => 'products.extended-detection-protection-response',
            'Identity Access Management' => 'products.identity-access-management',
            'Iot Security' => 'products.iot-security',
            'Multi Factor Authentication' => 'products.multi-factor-authentication',
            'Network Access Control' => 'products.network-access-control',
            'Next Generation Firewall' => 'products.next-generation-firewall',
            'Penetration Testing' => 'products.penetration-testing',
            'Privilege Access Management' => 'products.privilege-access-management',
            'Siem Solution' => 'products.siem-solution',
            'Threat Intelligence' => 'products.threat-intelligence',
            'Unified Threat Management' => 'products.unified-threat-management',
            'User Entity Behavior Analytics' => 'products.user-entity-behavior-analytics',
            'Web Application Firewall' => 'products.web-application-firewall',
            'Wifi Security' => 'products.wifi-security',
            'Zero Day Attack' => 'products.zero-day-attack',
            'Zero Trust' => 'products.zero-trust',
        ];

        return view('ciso/products/index', compact('productsData'));
    }
}
