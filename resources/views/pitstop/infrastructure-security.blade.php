@extends('layouts.process')
@section('title', 'Infrastructure Security')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Infrastructure Security">
                To support that all cyber security controls within the infrastructure are formally documented and the
                compliance is monitored and its effectiveness is evaluated periodically within the Member Organization.
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
            <h1>Infrastructure Security</h1>
        </header>
        <article>
            <h3>1. Description of the Infrastructure Security Technologies:</h3>
            <p>Infrastructure Security focuses on protecting an organization's foundational IT systems, including networks,
                servers, cloud environments, and endpoints, from cyber threats and unauthorized access. It ensures the
                confidentiality, integrity, and availability of critical assets, reducing risks associated with data
                breaches,
                service disruptions, and cyberattacks. A comprehensive infrastructure security framework incorporates
                multiple
                layers of protection, including firewalls, intrusion detection and prevention systems, identity and access
                controls, and endpoint security solutions. Organizations must also implement robust monitoring, incident
                response mechanisms, and continuous security assessments to detect and mitigate potential vulnerabilities.
                With
                evolving cyber threats, maintaining a proactive infrastructure security strategy is essential to
                safeguarding
                business operations and ensuring regulatory compliance.</p>

            <h3>2. Basic Concepts of Infrastructure Security</h3>
            <p>Infrastructure security refers to the protection of an organization's core IT systems, including networks,
                servers, cloud environments, and databases. These systems are the backbone of business operations, making
                them
                prime targets for cyber threats such as malware, unauthorized access, and data breaches. A strong
                infrastructure
                security strategy ensures that these critical assets are protected through a combination of preventive,
                detective, and corrective measures. Organizations implement various security frameworks, such as NIST and
                ISO
                27001, to establish best practices and compliance requirements.</p>
            <p>A key aspect of infrastructure security is network protection, which involves securing communication channels
                and
                preventing unauthorized access. Firewalls, intrusion detection and prevention systems (IDPS), and virtual
                private networks (VPNs) help safeguard data in transit. Additionally, endpoint security plays a crucial role
                in
                protecting devices such as servers, workstations, and mobile devices. Advanced solutions like endpoint
                detection
                and response (EDR) help detect and mitigate security threats before they cause significant harm.</p>
            <p>Another essential component is access control, which ensures that only authorized individuals can access
                sensitive systems and data. Multi-factor authentication (MFA) and role-based access control (RBAC) are
                widely
                used to restrict access based on user roles and privileges. Moreover, regular software updates and
                vulnerability
                management help protect against cyber threats by addressing security flaws before they can be exploited. By
                implementing these security controls, organizations can enhance resilience and reduce the risk of cyber
                incidents impacting their IT infrastructure.</p>

            <h3>3. Key Performance Indicators (KPIs) in Infrastructure Security</h3>
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
                        <td>Network Uptime</td>
                        <td>Measures the availability of critical network infrastructure.</td>
                        <td>Monthly</td>
                    </tr>
                    <tr>
                        <td>Patch Compliance Rate</td>
                        <td>Percentage of systems with up-to-date security patches.</td>
                        <td>Quarterly</td>
                    </tr>
                    <tr>
                        <td>Incident Detection Time</td>
                        <td>Average time taken to detect security incidents.</td>
                        <td>Weekly</td>
                    </tr>
                    <tr>
                        <td>Mean Time to Resolve (MTTR)</td>
                        <td>Average time taken to resolve security incidents.</td>
                        <td>Monthly</td>
                    </tr>
                    <tr>
                        <td>Unauthorized Access Attempts</td>
                        <td>Number of unauthorized access attempts detected.</td>
                        <td>Daily</td>
                    </tr>
                </tbody>
            </table>
            <h3>4. Infrastructure Security Products</h3>
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
                        <td>Firewalls</td>
                        <td>Protects networks by filtering incoming and outgoing traffic.</td>
                        <td>NCA Essential Cybersecurity Controls</td>
                    </tr>
                    <tr>
                        <td>Intrusion Detection Systems (IDS)</td>
                        <td>Monitors networks for malicious activities.</td>
                        <td>NCA Threat Management</td>
                    </tr>
                    <tr>
                        <td>Security Information and Event Management (SIEM)</td>
                        <td>Real-time monitoring and threat detection.</td>
                        <td>NCA Security Operations</td>
                    </tr>
                    <tr>
                        <td>Endpoint Detection and Response (EDR)</td>
                        <td>Protects endpoints from malware and cyber threats.</td>
                        <td>NCA Cybersecurity Defense</td>
                    </tr>
                    <tr>
                        <td>Zero Trust Security Solutions</td>
                        <td>Ensures continuous identity verification for access.</td>
                        <td>NCA Identity & Access Management</td>
                    </tr>
                    <tr>
                        <td>Cloud Security Posture Management (CSPM)</td>
                        <td>Monitors cloud environments for misconfigurations.</td>
                        <td>NCA Cloud Cybersecurity Controls</td>
                    </tr>
                    <tr>
                        <td>Next-Gen Antivirus (NGAV)</td>
                        <td>Advanced protection against malware and cyber threats.</td>
                        <td>NCA Endpoint Security</td>
                    </tr>
                    <tr>
                        <td>Physical Security Access Controls</td>
                        <td>Secures data centers and critical infrastructure.</td>
                        <td>NCA Physical Security</td>
                    </tr>
                    <tr>
                        <td>Automated Patch Management</td>
                        <td>Ensures all systems are up to date with security patches.</td>
                        <td>NCA Vulnerability Management</td>
                    </tr>
                    <tr>
                        <td>Data Loss Prevention (DLP) Solutions</td>
                        <td>Protects sensitive data from unauthorized access.</td>
                        <td>NCA Data Cybersecurity Controls</td>
                    </tr>
                </tbody>
            </table>
            <h3>5. Summary</h3>
            <p>Infrastructure security is fundamental to an organization's cybersecurity strategy, ensuring that its IT
                assets,
                networks, and endpoints remain protected against evolving threats. With the increasing complexity of digital
                ecosystems, organizations must adopt a layered security approach that integrates advanced technologies,
                continuous monitoring, and proactive threat detection. Effective infrastructure security not only protects
                against cyberattacks but also enhances business resilience, safeguards critical data, and ensures regulatory
                compliance. By implementing industry best practices, leveraging cutting-edge security tools, and staying
                ahead
                of emerging threats, organizations can build a robust security posture that supports sustainable and secure
                operations.</p>
        </article>
    </div>
@endsection
