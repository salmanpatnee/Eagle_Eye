<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PitstopController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pitstopData = [
            [
                'title' => 'Cyber Security Governance',
                'title_ar' => 'حوكمة الأمن السيبراني',
                'route' => 'pitstop.governance'
            ],
            [
                'title' => 'Cyber Security Strategy',
                'title_ar' => 'استراتيجية الأمن السيبراني',
                'route' => 'pitstop.strategy'
            ],
            [
                'title' => 'Cyber Security Policy',
                'title_ar' => 'سياسة الأمن السيبراني',
                'route' => 'pitstop.policies'
            ],
            [
                'title' => 'Cyber Security Roles and Responsibilities',
                'title_ar' => 'أدوار ومسؤوليات الأمن السيبراني',
                'route' => 'pitstop.roles'
            ],
            [
                'title' => 'Cyber Security in Project Management',
                'title_ar' => 'الأمن السيبراني في إدارة المشاريع',
                'route' => 'pitstop.project'
            ],
            [
                'title' => 'Cyber Security Awareness',
                'title_ar' => 'التوعية بالأمن السيبراني',
                'route' => 'pitstop.awareness'
            ],
            [
                'title' => 'Cyber Security Training',
                'title_ar' => 'التدريب على الأمن السيبراني',
                'route' => 'pitstop.training'
            ],
            [
                'title' => 'Cyber Security Risk Management',
                'title_ar' => 'إدارة مخاطر الأمن السيبراني',
                'route' => 'pitstop.risk'
            ],
            [
                'title' => 'Regulatory Compliance',
                'title_ar' => 'التدقيق المطلوب',
                'route' => 'pitstop.compliance'
            ],
            [
                'title' => 'Cyber Security Review',
                'title_ar' => 'مراجعة الأمن السيبراني',
                'route' => 'pitstop.review'
            ],
            [
                'title' => 'Cyber Security Audits',
                'title_ar' => 'تدقيقات الأمن السيبراني',
                'route' => 'pitstop.audit'
            ],
            [
                'title' => 'Human Resources',
                'title_ar' => 'الموارد البشرية',
                'route' => 'pitstop.hr'
            ],
            [
                'title' => 'Physical Security',
                'title_ar' => 'الأمن الجسدي',
                'route' => 'pitstop.physical'
            ],
            [
                'title' => 'Asset Management',
                'title_ar' => 'إدارة الأصول',
                'route' => 'pitstop.assets'
            ],
            [
                'title' => 'Cyber Security Architecture',
                'title_ar' => 'هندسة الأمن السيبراني',
                'route' => 'pitstop.architecture'
            ],
            [
                'title' => 'Identity and Access Management',
                'title_ar' => 'إدارة الهوية والوصول',
                'route' => 'pitstop.identity'
            ],
            [
                'title' => 'Application Security',
                'title_ar' => 'أمن التطبيق',
                'route' => ''
            ],
            [
                'title' => 'Change Management',
                'title_ar' => 'إدارة التغيير',
                'route' => 'pitstop.change'
            ],
            [
                'title' => 'Infrastructure Security',
                'title_ar' => 'أمن البنية التحتية',
                'route' => 'pitstop.infrastructure'
            ],
            [
                'title' => 'Cryptography',
                'title_ar' => 'التشفير',
                'route' => 'pitstop.cryptography'
            ],
            [
                'title' => 'Bring Your Own Device (BYOD)',
                'title_ar' => 'اجلب جهازك الخاص',
                'route' => 'pitstop.byod'
            ],
            [
                'title' => 'Secure Disposal of Information Assets',
                'title_ar' => 'التخلص الآمن من أصول المعلومات',
                'route' => 'pitstop.disposal'
            ],
            [
                'title' => 'Payment Systems',
                'title_ar' => 'أنظمة الدفع',
                'route' => 'pitstop.payment'
            ],
            [
                'title' => 'Electronic Banking Services',
                'title_ar' => 'الخدمات المصرفية الإلكترونية',
                'route' => 'pitstop.banking'
            ],
            [
                'title' => 'Cyber Security Event Management',
                'title_ar' => 'إدارة أحداث الأمن السيبراني',
                'route' => 'pitstop.event'
            ],
            [
                'title' => 'Cyber Security Incident Management',
                'title_ar' => 'إدارة حوادث الأمن السيبراني',
                'route' => 'pitstop.incident'
            ],
            [
                'title' => 'Threat Management',
                'title_ar' => 'إدارة التهديدات',
                'route' => 'pitstop.threat'
            ],
            [
                'title' => 'Vulnerability Management',
                'title_ar' => 'إدارة الثغرات الأمنية',
                'route' => 'pitstop.vulnerability'
            ],
            [
                'title' => 'Contract & Vendor Management',
                'title_ar' => 'إدارة العقود والبائعين',
                'route' => 'pitstop.contract'
            ],
            [
                'title' => 'Outsourcing',
                'title_ar' => 'الاستعانة بمصادر خارجية',
                'route' => 'pitstop.outsourcing'
            ],
            [
                'title' => 'Cloud Computing',
                'title_ar' => 'حوسبة سحابية',
                'route' => 'pitstop.cloud'
            ],
        ];

        return view('pitstop/index', compact('pitstopData'));
    }
}
