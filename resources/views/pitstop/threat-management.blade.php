@extends('layouts.pitstop')
@section('title', 'Threat Management')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Threat Management">
                To obtain an adequate understanding of the Member Organization’s emerging threat posture
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
            <h1>Threat Management</h1>
        </header>
        <article>
            <h3>1. Description of the Threat Management Technologies:</h3>
            <p>
                Threat Management is a proactive cybersecurity strategy aimed at identifying, assessing, and mitigating
                security
                threats before they can cause harm.
                It involves continuous monitoring, threat intelligence, vulnerability assessments, and incident response to
                protect an organization’s digital assets.
                Effective threat management ensures that security teams can detect and respond to potential risks in real
                time,
                reducing the likelihood of cyberattacks.
            </p>

            <p>
                Threat management is built on key components such as Security Information and Event Management (SIEM),
                Threat
                Intelligence Platforms, Endpoint Security,
                and Intrusion Detection Systems (IDS). By leveraging these technologies, organizations can gain deeper
                visibility into their network, detect malicious
                activity early, and implement countermeasures to neutralize threats.
            </p>

            <h3>2. Basic Concepts of Threat Management</h3>
            <p>Threat Management is a proactive cybersecurity approach that involves identifying, assessing, and mitigating
                threats to an organization's digital assets. It encompasses a combination of threat intelligence, risk
                analysis,
                and security controls to prevent cyber threats such as malware, phishing, ransomware, insider threats, and
                advanced persistent threats (APTs). Effective threat management strategies ensure that organizations can
                detect,
                analyze, and neutralize threats before they cause significant damage.</p>
            <p>A comprehensive threat management framework includes threat detection, risk assessment, threat intelligence,
                security analytics, and response planning. Security teams leverage tools such as Security Information and
                Event
                Management (SIEM), Endpoint Detection and Response (EDR), and Threat Intelligence Platforms (TIPs) to
                monitor
                and analyze potential threats. By continuously monitoring network traffic, system logs, and user behavior,
                organizations can identify unusual patterns that may indicate security risks.</p>
            <p>Threat management also involves vulnerability assessments and penetration testing to identify weaknesses
                before
                attackers exploit them. Regular security audits, compliance checks, and employee training programs further
                strengthen an organization's ability to prevent cyber threats. By implementing an effective threat
                management
                strategy, businesses can reduce security risks, enhance incident response, and protect sensitive data from
                cybercriminals.</p>

            <h3>2. Key Performance Indicators (KPIs) in Cybersecurity Governance</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Threat Detection Time</x-table.td>
                        <x-table.td>Measures how quickly potential threats are identified.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Time</x-table.td>
                        <x-table.td>Tracks how long it takes to respond to detected threats.</x-table.td>
                        <x-table.td>Monthly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>False Positive Rate</x-table.td>
                        <x-table.td>Evaluates the percentage of security alerts that turn out to be false
                            positives.</x-table.td>
                        <x-table.td>Quarterly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Number of Blocked Attacks</x-table.td>
                        <x-table.td>Counts the total number of cyberattacks prevented.</x-table.td>
                        <x-table.td>Weekly</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Accuracy</x-table.td>
                        <x-table.td>Measures the effectiveness of threat intelligence in detecting actual
                            threats.</x-table.td>
                        <x-table.td>Quarterly</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>3. Cybersecurity Governance Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Security Information and Event Management (SIEM)</x-table.td>
                        <x-table.td>Centralized logging and real-time threat detection.</x-table.td>
                        <x-table.td>NCA Threat Monitoring</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Platforms</x-table.td>
                        <x-table.td>Provides actionable insights into emerging cyber threats.</x-table.td>
                        <x-table.td>NCA Cyber Threat Intelligence</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Detection and Response (EDR)</x-table.td>
                        <x-table.td>Monitors endpoint activities to detect and mitigate threats.</x-table.td>
                        <x-table.td>NCA Endpoint Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Intrusion Detection and Prevention Systems (IDPS)</x-table.td>
                        <x-table.td>Detects and blocks suspicious network activity.</x-table.td>
                        <x-table.td>NCA Network Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Next-Generation Firewalls (NGFW)</x-table.td>
                        <x-table.td>Provides deep packet inspection and advanced threat protection.</x-table.td>
                        <x-table.td>NCA Perimeter Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Solutions</x-table.td>
                        <x-table.td>Monitors cloud environments for security threats.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Zero Trust Security Platforms</x-table.td>
                        <x-table.td>Enforces strict access controls to minimize security risks.</x-table.td>
                        <x-table.td>NCA Identity and Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Hunting Tools</x-table.td>
                        <x-table.td>Actively searches for indicators of compromise within the network.</x-table.td>
                        <x-table.td>NCA Cybersecurity Threat Response</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Management Solutions</x-table.td>
                        <x-table.td>Identifies and remediates security vulnerabilities.</x-table.td>
                        <x-table.td>NCA Risk Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Deception Technology</x-table.td>
                        <x-table.td>Deploys decoys to detect and mislead cyber attackers.</x-table.td>
                        <x-table.td>NCA Advanced Threat Protection</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Summary</h3>
            <p>
                A strong threat management strategy is crucial for protecting an organization from evolving cyber threats.
                By
                implementing proactive monitoring,
                intelligence gathering, and incident response solutions, businesses can significantly reduce their exposure
                to
                cyber risks. Organizations that
                adopt a layered security approach, combining real-time analytics, AI-driven threat detection, and advanced
                security controls, can effectively
                mitigate potential attacks and enhance their overall cybersecurity posture.
            </p>
        </article>
    </div>
@endsection
