@extends('layouts.pitstop')
@section('title', 'Cyber Security Risk Management')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security Risk Management">
                To document the Member Organization’s commitment and objectives of cyber security, and to
                communicate this to the relevant stakeholders.
            </x-iso-content-card>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
            <div class="flex flex-col gap-6">
                <x-iso-checklist link="#" />
                <x-iso-glossary link="#" />
            </div>
            <div class="flex flex-col gap-6">
                <x-iso-video link="#" />
                <x-iso-templates link="#" />
            </div>
        </div>
    </div>
@endsection

@section('additional_content')

    <div class="bg-white my-6 p-5 rounded-2xl process-content">
        <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>Cyber Security Risk Management</h1>
        </header>
        <article>
            <h3>1. Description of Cybersecurity Risk Management Technologies:</h3>
            <p>Cybersecurity risk management technologies enable organizations to identify, assess, mitigate, and monitor
                cyber
                threats while ensuring compliance with frameworks like NCA Essential Cybersecurity Controls (ECC) and NCA
                Critical Cybersecurity Controls (CSCC). These technologies include Risk Management Platforms, which help
                organizations document, assess, and track risks while automating compliance processes. Security Information
                and
                Event Management (SIEM) Systems analyze security logs in real time to detect threats and reduce the risk of
                cyber incidents. Threat Intelligence Platforms (TIPs) provide insights into emerging threats and
                vulnerabilities, helping organizations proactively manage risks. Vulnerability Management Systems
                continuously
                scan IT environments to detect weaknesses before attackers exploit them. Governance, Risk, and Compliance
                (GRC)
                Tools streamline risk reporting and compliance with cybersecurity policies. Additionally, Incident Response
                Platforms help organizations contain and mitigate security breaches, while Penetration Testing (PT) Tools
                simulate attacks to evaluate security defenses. These technologies work together to provide a comprehensive
                risk
                management framework that enhances an organization's cybersecurity resilience.</p>

            <h3>2. Basic Concepts of Cyber Security Risk Management</h3>
            <p>Cyber Security Risk Management is the process of identifying, assessing, and mitigating risks that threaten
                an
                organization's information assets. As cyber threats evolve, businesses must establish a structured framework
                to
                evaluate potential vulnerabilities, assess the impact of cyber incidents, and implement proactive security
                measures. Effective risk management involves a balance between security controls, business operations, and
                compliance requirements to ensure organizational resilience.</p>
            <p>A key aspect of Cyber Security Risk Management is risk assessment, which involves identifying critical
                assets,
                analyzing potential threats, and estimating the likelihood and impact of cyber-attacks. This assessment
                helps
                organizations prioritize risks based on their severity and allocate resources efficiently. Common risk
                management strategies include risk avoidance, risk mitigation, risk transfer (such as cyber insurance), and
                risk
                acceptance. Organizations often use security frameworks like ISO 27001, NIST Cybersecurity Framework, and
                CIS
                Controls to guide their risk management practices.</p>
            <p>Continuous monitoring and reassessment of cyber risks are crucial in an ever-changing threat landscape.
                Organizations must regularly update their risk management strategies, conduct security audits, penetration
                testing, and incident response drills, and ensure compliance with regulatory standards. By fostering a
                risk-aware culture and integrating cyber security risk management into business processes, organizations can
                enhance their security posture, minimize financial losses, and maintain trust with customers and
                stakeholders.
            </p>

            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Risk Management</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Cybersecurity Risk Assessment Completion</x-table.td>
                        <x-table.td>Percentage of completed risk assessments as per policy.</x-table.td>
                        <x-table.td>Annually (NCA-ECC-1-5-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Time</x-table.td>
                        <x-table.td>Measures the average time taken to detect and respond to cyber threats.</x-table.td>
                        <x-table.td>Quarterly (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance with Risk Mitigation Plans</x-table.td>
                        <x-table.td>Tracks adherence to recommended security controls and remediation actions.</x-table.td>
                        <x-table.td>Annually (NCA Risk Management)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Number of Open Security Vulnerabilities</x-table.td>
                        <x-table.td>Counts unresolved vulnerabilities that pose security risks.</x-table.td>
                        <x-table.td>Monthly (NCA Vulnerability Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Effectiveness</x-table.td>
                        <x-table.td>Assesses how well threat intelligence helps prevent cyber incidents.</x-table.td>
                        <x-table.td>Bi-Annually (NCA Cyber Threat)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity Risk Management Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Risk Management Platforms</x-table.td>
                        <x-table.td>Helps identify, assess, and mitigate cybersecurity risks.</x-table.td>
                        <x-table.td>NCA Risk Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Security Information & Event Management (SIEM)</x-table.td>
                        <x-table.td>Monitors security logs and detects cyber threats in real-time.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Platforms (TIPs)</x-table.td>
                        <x-table.td>Provides real-time insights on cyber threats and vulnerabilities.</x-table.td>
                        <x-table.td>NCA Threat Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Management Systems</x-table.td>
                        <x-table.td>Scans IT environments for security weaknesses.</x-table.td>
                        <x-table.td>NCA Vulnerability Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Governance, Risk, and Compliance (GRC) Tools</x-table.td>
                        <x-table.td>Tracks risk compliance and automates cybersecurity reporting.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Penetration Testing (PT) Tools</x-table.td>
                        <x-table.td>Simulates cyberattacks to test an organization’s security defenses.</x-table.td>
                        <x-table.td>NCA Penetration Testing</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Posture Management (CSPM)</x-table.td>
                        <x-table.td>Identifies and mitigates risks in cloud environments.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Platforms</x-table.td>
                        <x-table.td>Manages security breaches and containment strategies.</x-table.td>
                        <x-table.td>NCA Incident Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Detection & Response (EDR)</x-table.td>
                        <x-table.td>Detects and responds to endpoint security threats.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP)</x-table.td>
                        <x-table.td>Prevents unauthorized access and data breaches.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Cybersecurity risk management is a critical function for organizations to protect their assets, data, and
                operations from cyber threats. Implementing risk management platforms, SIEM solutions, threat intelligence
                systems, and vulnerability management tools ensures a proactive approach to cybersecurity. By tracking key
                performance indicators (KPIs) such as risk assessment completion and incident response times, organizations
                can
                measure the effectiveness of their risk management strategies. Compliance with NCA cybersecurity frameworks
                ensures that organizations follow structured risk mitigation processes to enhance security resilience. A
                strong
                cybersecurity risk management program reduces vulnerabilities, prevents data breaches, and strengthens
                overall
                cybersecurity posture, ensuring sustained protection against evolving threats.</p>
        </article>
    </div>
@endsection
