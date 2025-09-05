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
            <table>
                <thead>
                    <tr>
                        <th>KPI Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Security Review Completion Rate</td>
                        <td>Measures the percentage of completed cybersecurity reviews.</td>
                        <td>Annually (NCA-ECC-1-8-1)</td>
                    </tr>
                    <tr>
                        <td>Vulnerability Remediation Time</td>
                        <td>Tracks the average time taken to fix identified security vulnerabilities.</td>
                        <td>Monthly (NCA Vulnerability Mgmt)</td>
                    </tr>
                    <tr>
                        <td>Compliance Audit Pass Rate</td>
                        <td>Percentage of security reviews that meet regulatory compliance.</td>
                        <td>Annually (NCA Compliance Mgmt)</td>
                    </tr>
                    <tr>
                        <td>Incident Detection Efficiency</td>
                        <td>Assesses the effectiveness of security monitoring tools in detecting threats.</td>
                        <td>Quarterly (NCA Incident Mgmt)</td>
                    </tr>
                    <tr>
                        <td>Penetration Testing Success Rate</td>
                        <td>Measures the percentage of security weaknesses identified in PT exercises.</td>
                        <td>Bi-Annually (NCA Penetration Testing)</td>
                    </tr>
                </tbody>
            </table>
            <h3>4. Cybersecurity Review Products</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Relevant Standard</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Governance, Risk, and Compliance (GRC) Platforms</td>
                        <td>Tracks security reviews, policy adherence, and compliance reports.</td>
                        <td>NCA Cybersecurity Governance</td>
                    </tr>
                    <tr>
                        <td>Security Information & Event Management (SIEM)</td>
                        <td>Provides real-time security monitoring and log analysis.</td>
                        <td>NCA Cybersecurity Defense</td>
                    </tr>
                    <tr>
                        <td>Vulnerability Assessment (VA) Tools</td>
                        <td>Scans networks and systems for security vulnerabilities.</td>
                        <td>NCA Vulnerability Management</td>
                    </tr>
                    <tr>
                        <td>Penetration Testing (PT) Tools</td>
                        <td>Simulates cyberattacks to test security defenses.</td>
                        <td>NCA Penetration Testing</td>
                    </tr>
                    <tr>
                        <td>Cloud Security Posture Management (CSPM)</td>
                        <td>Ensures continuous security compliance for cloud environments.</td>
                        <td>NCA Cloud Cybersecurity Controls</td>
                    </tr>
                    <tr>
                        <td>Automated Compliance Auditing Tools</td>
                        <td>Validates security controls and generates compliance reports.</td>
                        <td>NCA Compliance Management</td>
                    </tr>
                    <tr>
                        <td>Endpoint Detection & Response (EDR)</td>
                        <td>Monitors and responds to security threats on endpoints.</td>
                        <td>NCA Cybersecurity Defense</td>
                    </tr>
                    <tr>
                        <td>Threat Intelligence Platforms (TIPs)</td>
                        <td>Provides insights into emerging cybersecurity threats.</td>
                        <td>NCA Cyber Threat Intelligence</td>
                    </tr>
                    <tr>
                        <td>Data Loss Prevention (DLP)</td>
                        <td>Ensures adherence to data protection policies by preventing data leaks.</td>
                        <td>NCA Data Cybersecurity Controls</td>
                    </tr>
                    <tr>
                        <td>Secure Configuration Management Tools</td>
                        <td>Automates system and network security configurations.</td>
                        <td>NCA Secure Configuration</td>
                    </tr>
                </tbody>
            </table>
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
