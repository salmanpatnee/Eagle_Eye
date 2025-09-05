@extends('layouts.process')
@section('title', 'Cyber Security Architecture')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security Architecture">
                To support the Member Organization in achieving a strategic, consistent, cost effective and end-to-end
                cyber security architecture.
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
            <h1>Cyber Security Architecture</h1>
        </header>
        <article>
            <h3>1. Description of the Cyber Security Architecture Technologies:</h3>
            <p>
                Cyber Security Architecture encompasses the design, implementation, and maintenance of security solutions to
                protect an organization's IT infrastructure, data, and systems. It involves multiple layers of defense,
                including network security, endpoint security, cloud security, and identity and access management. Key
                technologies include firewalls, intrusion detection and prevention systems (IDPS), encryption, zero trust
                architecture, security information and event management (SIEM), and multi-factor authentication (MFA). These
                technologies work together to mitigate risks, detect threats, and ensure compliance with cybersecurity
                standards
                such as NCA Essential Cybersecurity Controls and NCA Data Cybersecurity Control. Organizations must
                continuously
                evolve their security architecture to counter emerging cyber threats and maintain a resilient security
                posture.
            </p>

            <h3>2. Basic Concepts of Cyber Security Architecture</h3>
            <p>Cyber Security Architecture is the foundation of an organization's security framework, ensuring that systems,
                networks, applications, and data are protected from cyber threats. It defines the security policies,
                processes,
                and technologies used to safeguard digital assets. A well-designed security architecture ensures that
                security
                controls are integrated, scalable, and aligned with business objectives.</p>
            <p>Modern cyber security architectures are built on the principles of defense in depth, where multiple layers of
                security controls are implemented to mitigate risks. These layers include perimeter security (firewalls,
                intrusion detection systems), endpoint security (antivirus, device management), data security (encryption,
                access controls), and application security (secure coding practices, vulnerability scanning). Additionally,
                organizations are increasingly adopting a Zero Trust Architecture (ZTA), which assumes that no
                entity—whether
                inside or outside the network—should be trusted by default, enforcing strict authentication and access
                control
                mechanisms.</p>
            <p>Another critical component is security monitoring and incident response. Security Information and Event
                Management (SIEM) systems, along with AI-powered threat detection tools, help organizations monitor network
                traffic, detect anomalies, and respond to cyber threats in real-time. Regular security assessments, such as
                penetration testing and vulnerability management, further strengthen the security architecture by
                identifying
                and mitigating potential weaknesses.</p>
            <p>By implementing a robust Cyber Security Architecture, organizations can effectively reduce cyber risks,
                protect
                sensitive data, and ensure compliance with regulatory standards such as NIST, ISO 27001, and NCA
                Cybersecurity
                Standards. A proactive and well-defined security framework is essential for maintaining a strong defense
                against
                evolving cyber threats.</p>

            <h3>3. Key Performance Indicators (KPIs) in Cyber Security Architecture</h3>
            <table>
                <thead>
                    <tr>
                        <th>KPI Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tr>
                    <td>Incident Response Time</td>
                    <td>Measures the average time taken to detect, analyze, and mitigate security incidents.</td>
                    <td>Monthly</td>
                </tr>
                <tr>
                    <td>System Uptime</td>
                    <td>Tracks the availability and reliability of critical security systems and services.</td>
                    <td>Real-time</td>
                </tr>
                <tr>
                    <td>Vulnerability Remediation Time</td>
                    <td>Calculates the time taken to patch or mitigate identified vulnerabilities.</td>
                    <td>Weekly</td>
                </tr>
                <tr>
                    <td>Phishing Email Click Rate</td>
                    <td>Evaluates employee awareness by tracking how many users click on simulated phishing links.</td>
                    <td>Quarterly</td>
                </tr>
                <tr>
                    <td>SIEM Log Coverage</td>
                    <td>Assesses the percentage of IT infrastructure covered by security logging and monitoring.</td>
                    <td>Daily</td>
                </tr>
            </table>

            <h3>4. Cybersecurity Governance Products</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Relevant Standard</th>
                    </tr>
                </thead>
                <tr>
                    <td>Firewalls</td>
                    <td>Network security devices that filter and monitor incoming and outgoing traffic.</td>
                    <td>NCA Essential Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Intrusion Detection & Prevention Systems (IDPS)</td>
                    <td>Monitors network traffic for suspicious activities and blocks threats.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Endpoint Detection & Response (EDR)</td>
                    <td>Provides real-time monitoring and response capabilities for endpoint security.</td>
                    <td>NCA Critical Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Security Information and Event Management (SIEM)</td>
                    <td>Aggregates and analyzes security logs to detect anomalies and threats.</td>
                    <td>NCA Data Cybersecurity Control</td>
                </tr>
                <tr>
                    <td>Identity and Access Management (IAM)</td>
                    <td>Controls user access to systems and enforces authentication policies.</td>
                    <td>NCA Identity & Access Management</td>
                </tr>
                <tr>
                    <td>Zero Trust Network Access (ZTNA)</td>
                    <td>Ensures that access to resources is granted based on strict identity verification.</td>
                    <td>NCA Cybersecurity Governance</td>
                </tr>
                <tr>
                    <td>Multi-Factor Authentication (MFA)</td>
                    <td>Adds an extra layer of authentication beyond passwords to enhance security.</td>
                    <td>NCA Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Cloud Security Posture Management (CSPM)</td>
                    <td>Monitors cloud configurations to ensure compliance and security best practices.</td>
                    <td>NCA Cloud Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Secure Web Gateways</td>
                    <td>Filters and monitors web traffic to prevent malware infections and data leakage.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention (DLP)</td>
                    <td>Protects sensitive data by preventing unauthorized access and sharing.</td>
                    <td>NCA Data Cybersecurity Control</td>
                </tr>
            </table>

            <h3>5. Summary</h3>
            <p>Cyber Security Architecture plays a crucial role in safeguarding an organization’s digital assets, data, and
                infrastructure. By leveraging technologies like firewalls, IDPS, SIEM, and IAM, organizations can establish
                a
                multi-layered security defense against cyber threats. KPIs such as incident response time and system uptime
                help
                measure the effectiveness of security controls and ensure continuous improvement. Adopting the right
                security
                products, including endpoint security, cloud security, and data protection solutions, enhances resilience
                against cyber risks. As cyber threats continue to evolve, organizations must stay proactive in implementing
                and
                upgrading their security architecture to remain compliant with NCA standards and maintain a robust security
                posture.</p>
        </article>
    </div>
@endsection
