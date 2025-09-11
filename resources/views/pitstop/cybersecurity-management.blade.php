@extends('layouts.pitstop')
@section('title', 'Cybersecurity Strategy')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cybersecurity Strategy">
                To ensure that cyber security initiatives and projects within the Member Organization contribute to the
                Member
                Organization’s strategic objectives and are aligned with the Banking Sector’s cyber security strategy.
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
            <h1>Cybersecurity Strategy</h1>
        </header>
        <article>
            <h3>1. Description of Cybersecurity Strategy Technologies:</h3>
            <p>Cybersecurity strategy technologies provide organizations with the necessary tools and frameworks to protect
                their digital assets, manage risks, and ensure compliance with cybersecurity standards such as the National
                Cybersecurity Authority (NCA) controls. These technologies include Risk Management Platforms, which help in
                identifying, assessing, and mitigating cyber risks; Security Information and Event Management (SIEM)
                Systems,
                which monitor and analyze security events in real time; Identity and Access Management (IAM) solutions,
                which
                enforce access control policies; and Governance, Risk, and Compliance (GRC) tools, which assist in policy
                enforcement and regulatory compliance. Additionally, Threat Intelligence Platforms (TIPs) provide
                organizations
                with actionable intelligence on emerging threats, while Vulnerability Management Solutions help in
                proactively
                identifying and mitigating security gaps. These technologies collectively form the backbone of a
                cybersecurity
                strategy by ensuring continuous monitoring, rapid incident response, and alignment with security policies
                and
                frameworks like the NCA Essential Cybersecurity Controls (ECC).</p>

            <h3>2. Basic Concepts of Cybersecurity Strategy</h3>
            <p>Cybersecurity governance is the foundation of an organization's security framework, ensuring that security
                policies, procedures, and controls align with business objectives and regulatory requirements. It involves
                defining roles, responsibilities, and accountability for security measures across an organization. Effective
                cybersecurity governance helps organizations protect sensitive data, prevent cyber threats, and comply with
                industry standards like NCA Essential Cybersecurity Controls and NCA Critical Cybersecurity Controls.
                Governance
                frameworks such as ISO 27001, NIST Cybersecurity Framework, and CIS Controls provide structured guidelines
                for
                implementing and managing security policies.</p>
            <p>Technology plays a critical role in cybersecurity governance by enabling organizations to automate security
                processes, monitor risks, and enforce compliance policies. Security Information and Event Management (SIEM)
                systems, for example, provide real-time threat detection and analysis, helping organizations respond quickly
                to
                security incidents. Identity and Access Management (IAM) solutions ensure that only authorized users can
                access
                critical systems, reducing the risk of insider threats and unauthorized access. Additionally, technologies
                such
                as encryption and multi-factor authentication (MFA) enhance data protection by securing communication
                channels
                and user credentials.</p>
            <p>Cybersecurity governance also includes risk management, incident response planning, and continuous monitoring
                of
                IT systems. Organizations must regularly assess their security posture through audits, penetration testing,
                and
                vulnerability assessments. Implementing a governance framework helps businesses establish a security
                culture,
                where employees are aware of security risks and follow best practices. A well-defined cybersecurity
                governance
                structure improves resilience against cyber threats and ensures that businesses can recover quickly from
                security incidents.</p>
            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Strategy</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Cybersecurity Strategy Review</x-table.td>
                        <x-table.td>Measures how often the cybersecurity strategy is updated and reviewed.</x-table.td>
                        <x-table.td>Once in 3 years (NCA-ECC-1-1-3)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Risk Assessment Completion</x-table.td>
                        <x-table.td>Evaluates the percentage of completed risk assessments.</x-table.td>
                        <x-table.td>Annually (NCA-CSCC-1-2-1-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance with Cybersecurity Policies</x-table.td>
                        <x-table.td>Tracks the implementation of cybersecurity frameworks and policies.</x-table.td>
                        <x-table.td>Annually (NCA-ECC-1-8-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Effectiveness</x-table.td>
                        <x-table.td>Measures the response time and resolution of cybersecurity incidents.</x-table.td>
                        <x-table.td>Quarterly (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cybersecurity Awareness Program Reach</x-table.td>
                        <x-table.td>Percentage of employees trained in cybersecurity policies and threats.</x-table.td>
                        <x-table.td>Quarterly (NCA-ECC-1-10-3)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity Strategy Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>SIEM (Security Information & Event Management)</x-table.td>
                        <x-table.td>Provides real-time security monitoring and event correlation.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Risk Management Software</x-table.td>
                        <x-table.td>Assists in identifying and mitigating cybersecurity risks.</x-table.td>
                        <x-table.td>NCA Risk Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>IAM (Identity & Access Management)</x-table.td>
                        <x-table.td>Manages access to systems and enforces authentication policies.</x-table.td>
                        <x-table.td>NCA-ECC-1-2-1</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance Management Tools</x-table.td>
                        <x-table.td>Automates tracking and reporting for regulatory compliance.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Platforms</x-table.td>
                        <x-table.td>Provides insights into emerging cybersecurity threats.</x-table.td>
                        <x-table.td>NCA Cybersecurity Resilience</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Management Systems</x-table.td>
                        <x-table.td>Identifies and mitigates security vulnerabilities.</x-table.td>
                        <x-table.td>NCA Vulnerability Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Security Solutions</x-table.td>
                        <x-table.td>Protects user devices from malware, phishing, and ransomware attacks.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Solutions</x-table.td>
                        <x-table.td>Ensures security compliance for cloud-hosted infrastructure.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Platforms</x-table.td>
                        <x-table.td>Helps in managing and responding to security breaches.</x-table.td>
                        <x-table.td>NCA Incident Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP) Tools</x-table.td>
                        <x-table.td>Prevents unauthorized access and data exfiltration.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>A robust cybersecurity strategy is essential for protecting an organization’s digital infrastructure from
                evolving threats while ensuring compliance with regulatory standards like the NCA Essential Cybersecurity
                Controls (ECC), NCA Cloud Cybersecurity Controls (CCC), and NCA Critical Cybersecurity Controls (CSCC). By
                implementing technologies such as SIEM, IAM, risk management platforms, and compliance management tools,
                organizations can proactively detect threats, mitigate risks, and respond to security incidents in real
                time.
                Key performance indicators help track the effectiveness of cybersecurity programs and guide continuous
                improvement efforts. With the right strategy, technologies, and governance, organizations can strengthen
                their
                cyber resilience, safeguard sensitive data, and align with national cybersecurity objectives.</p>
        </article>
    </div>
@endsection
