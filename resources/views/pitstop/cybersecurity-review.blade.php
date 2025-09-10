@extends('layouts.process')
@section('title', 'Cyber Security Review')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security Review">
                To ascertain whether the cyber security controls are securely designed and implemented, and the
                effectiveness of these controls is being monitored.
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
            <h1>Cyber Security Review</h1>
        </header>
        <article>
            <h3>1. Description of Cybersecurity Review Technologies:</h3>
            <p>Cybersecurity review technologies are essential for evaluating an organization’s security posture,
                identifying
                vulnerabilities, and ensuring compliance with frameworks like NCA Essential Cybersecurity Controls (ECC),
                NCA
                Critical Cybersecurity Controls (CSCC), and NCA Cloud Cybersecurity Controls (CCC). These technologies
                enable
                organizations to conduct security assessments, automate compliance checks, and continuously monitor for
                potential threats. Governance, Risk, and Compliance (GRC) platforms facilitate structured cybersecurity
                reviews
                by tracking security policies, risk assessments, and compliance status. Security Information and Event
                Management (SIEM) systems provide real-time visibility into security incidents and log data to identify
                anomalies. Vulnerability Assessment (VA) and Penetration Testing (PT) tools proactively detect security gaps
                by
                scanning networks and simulating cyberattacks. Automated Compliance Auditing Tools streamline security
                reviews
                by validating adherence to NCA cybersecurity standards. Additionally, Endpoint Detection and Response (EDR)
                solutions monitor endpoints for suspicious activities, ensuring that security controls are effective. These
                technologies help organizations implement continuous security assessments, improve resilience, and maintain
                regulatory compliance.</p>

            <h3>2. Basic Concepts of Cyber Security Review</h3>
            <p>A Cyber Security Review is a structured assessment of an organization's security policies, controls, and
                systems
                to identify vulnerabilities, ensure compliance, and improve the overall security posture. This review helps
                organizations evaluate their cybersecurity framework, detect potential weaknesses, and implement necessary
                improvements to safeguard critical assets from cyber threats.</p>
            <p>A comprehensive Cyber Security Review includes assessing key areas such as network security, data protection,
                access controls, threat management, and incident response capabilities. It involves reviewing firewalls,
                intrusion detection systems (IDS), antivirus solutions, encryption methods, and security policies to ensure
                they
                align with industry best practices and regulatory standards such as ISO 27001, NIST, and the NCA
                Cybersecurity
                Controls. Organizations must also conduct risk assessments to identify potential cyber risks and implement
                mitigation strategies to minimize security breaches.</p>
            <p>Regular cybersecurity reviews help organizations stay ahead of evolving cyber threats. By conducting periodic
                security audits, vulnerability scans, and penetration testing, businesses can proactively identify and fix
                security gaps. Additionally, employee awareness training and compliance checks should be part of the review
                process to ensure a strong cybersecurity culture. Ultimately, a well-executed Cyber Security Review enhances
                an
                organization's ability to prevent, detect, and respond to cyber threats effectively, reducing the risk of
                financial and reputational damage.</p>


            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Review</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Security Review Completion Rate</x-table.td>
                        <x-table.td>Measures the percentage of completed cybersecurity reviews.</x-table.td>
                        <x-table.td>Annually (NCA-ECC-1-8-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Remediation Time</x-table.td>
                        <x-table.td>Tracks the average time taken to fix identified security vulnerabilities.</x-table.td>
                        <x-table.td>Monthly (NCA Vulnerability Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance Audit Pass Rate</x-table.td>
                        <x-table.td>Percentage of security reviews that meet regulatory compliance.</x-table.td>
                        <x-table.td>Annually (NCA Compliance Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Detection Efficiency</x-table.td>
                        <x-table.td>Assesses the effectiveness of security monitoring tools in detecting
                            threats.</x-table.td>
                        <x-table.td>Quarterly (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Penetration Testing Success Rate</x-table.td>
                        <x-table.td>Measures the percentage of security weaknesses identified in PT exercises.</x-table.td>
                        <x-table.td>Bi-Annually (NCA Penetration Testing)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity Review Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Governance, Risk, and Compliance (GRC) Platforms</x-table.td>
                        <x-table.td>Tracks security reviews, policy adherence, and compliance reports.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Security Information & Event Management (SIEM)</x-table.td>
                        <x-table.td>Provides real-time security monitoring and log analysis.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Assessment (VA) Tools</x-table.td>
                        <x-table.td>Scans networks and systems for security vulnerabilities.</x-table.td>
                        <x-table.td>NCA Vulnerability Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Penetration Testing (PT) Tools</x-table.td>
                        <x-table.td>Simulates cyberattacks to test security defenses.</x-table.td>
                        <x-table.td>NCA Penetration Testing</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Posture Management (CSPM)</x-table.td>
                        <x-table.td>Ensures continuous security compliance for cloud environments.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Automated Compliance Auditing Tools</x-table.td>
                        <x-table.td>Validates security controls and generates compliance reports.</x-table.td>
                        <x-table.td>NCA Compliance Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Detection & Response (EDR)</x-table.td>
                        <x-table.td>Monitors and responds to security threats on endpoints.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Platforms (TIPs)</x-table.td>
                        <x-table.td>Provides insights into emerging cybersecurity threats.</x-table.td>
                        <x-table.td>NCA Cyber Threat Intelligence</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP)</x-table.td>
                        <x-table.td>Ensures adherence to data protection policies by preventing data leaks.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Configuration Management Tools</x-table.td>
                        <x-table.td>Automates system and network security configurations.</x-table.td>
                        <x-table.td>NCA Secure Configuration</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>A comprehensive cybersecurity review is vital for identifying security risks, ensuring regulatory compliance,
                and
                improving an organization’s security resilience. Organizations should implement GRC platforms, SIEM systems,
                vulnerability assessment tools, and penetration testing solutions to conduct structured security assessments
                and
                continuous monitoring. Key performance indicators (KPIs) such as review completion rates, vulnerability
                remediation times, and compliance audit pass rates help organizations measure the effectiveness of their
                security review processes. Compliance with NCA cybersecurity frameworks ensures that organizations maintain
                strong security controls, minimize risks, and respond effectively to cyber threats. By integrating regular
                security reviews, proactive risk assessments, and automated compliance monitoring, organizations can achieve
                a
                robust cybersecurity posture and enhance protection against evolving cyber risks.</p>
        </article>
    </div>
@endsection
