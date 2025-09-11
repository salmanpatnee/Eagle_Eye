@extends('layouts.pitstop')
@section('title', 'Cyber Security Governance')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security Governance">
                To direct and control the overall approach to cyber security within the Member Organization.
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

    <div class="bg-white my-6 p-5 rounded-2xl">
        <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>Cyber Security Governance</h1>
        </header>
        <article class="process-content">
            <h3>1. Description of the Cybersecurity Governance Technologies:</h3>
            <p>Cybersecurity governance refers to the framework that ensures the implementation and maintenance of
                security practices across an organization’s information systems. Technologies supporting governance
                involve tools that allow for the continuous monitoring, compliance, and reporting of cybersecurity
                controls and processes. These include Identity and Access Management (IAM) systems, risk management
                platforms, security information and event management (SIEM) systems, and compliance management software.
                Governance technologies ensure that organizations adhere to policies and frameworks like the National
                Cybersecurity Authority (NCA) standards, and they provide visibility into security operations, automate
                audits, enforce access controls, and maintain compliance with national and international regulations.
                These technologies enable organizations to manage cybersecurity risks, track performance, and make
                informed decisions about resource allocation and improvements.</p>

            <h3>2. Basic Concepts of Cybersecurity Governance</h3>
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

            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Governance</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Cybersecurity Strategy Review</x-table.td>
                        <x-table.td>Measures the frequency of updates and reviews to cybersecurity strategies.</x-table.td>
                        <x-table.td>Once in 3 years (NCA-ECC-1-1-3)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cybersecurity Management Review</x-table.td>
                        <x-table.td>Tracks regular reviews of cybersecurity management effectiveness.</x-table.td>
                        <x-table.td>Quarterly (NCA-ECC-1-2-3)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance with Cybersecurity Standards</x-table.td>
                        <x-table.td>Monitors adherence to internal and external cybersecurity frameworks.</x-table.td>
                        <x-table.td>Annually (NCA-ECC-1-8-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Risk Assessment Completion</x-table.td>
                        <x-table.td>Evaluates how regularly the cybersecurity risks are assessed.</x-table.td>
                        <x-table.td>Annually (NCA-CSCC-1-2-1-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Training and Awareness Program Coverage</x-table.td>
                        <x-table.td>Measures the extent to which personnel are trained in cybersecurity best
                            practices.</x-table.td>
                        <x-table.td>Quarterly (NCA-ECC-1-10-3)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity Governance Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>SIEM (Security Information and Event Management)</x-table.td>
                        <x-table.td>Provides real-time analysis and reporting of security alerts.</x-table.td>
                        <x-table.td>NCA Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>IAM (Identity and Access Management)</x-table.td>
                        <x-table.td>Manages user identities and access privileges across systems.</x-table.td>
                        <x-table.td>NCA-ECC-1-2-1</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance Management Software</x-table.td>
                        <x-table.td>Automates compliance checks and reporting for security frameworks.</x-table.td>
                        <x-table.td>NCA Cybersecurity Framework</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Risk Management Tools</x-table.td>
                        <x-table.td>Assists in identifying, assessing, and mitigating cybersecurity risks.</x-table.td>
                        <x-table.td>NCA Risk Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Security Solutions</x-table.td>
                        <x-table.td>Provides protection against threats on individual devices.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Backup and Recovery Tools</x-table.td>
                        <x-table.td>Ensures secure data backup and recovery processes.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Scanners</x-table.td>
                        <x-table.td>Detects weaknesses in systems that could be exploited.</x-table.td>
                        <x-table.td>NCA Vulnerability Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Intelligence Platforms</x-table.td>
                        <x-table.td>Monitors and provides insights into emerging security threats.</x-table.td>
                        <x-table.td>NCA Cybersecurity Resilience</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP)</x-table.td>
                        <x-table.td>Prevents unauthorized access to or sharing of sensitive data.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Solutions</x-table.td>
                        <x-table.td>Secures cloud infrastructure and services.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Cybersecurity governance is the cornerstone of any organization's approach to mitigating risks, ensuring
                compliance, and maintaining a secure operational environment. The combination of strategic planning,
                continuous monitoring, and leveraging advanced technologies provides the framework necessary to
                safeguard an organization’s data and infrastructure. By adhering to national standards, such as those
                outlined by the NCA, and implementing relevant cybersecurity products and KPIs, organizations can
                enhance their defense mechanisms, streamline risk management, and uphold a resilient security posture.
                This not only protects the organization from evolving cyber threats but also ensures alignment with
                regulatory expectations and best practices in the cybersecurity field.</p>
        </article>
    </div>
@endsection
