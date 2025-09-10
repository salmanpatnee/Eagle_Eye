@extends('layouts.process')
@section('title', 'Regulatory Compliance')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Regulatory Compliance">
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
            <h1>Regulatory Compliance</h1>
        </header>
        <article>
            <h3>1. Description of Regulatory Compliance Technologies:</h3>
            <p>Regulatory compliance technologies help organizations adhere to national and international cybersecurity
                regulations, such as the NCA Essential Cybersecurity Controls (ECC), NCA Critical Cybersecurity Controls
                (CSCC),
                and NCA Cloud Cybersecurity Controls (CCC). These technologies ensure that organizations meet legal,
                regulatory,
                and policy requirements by automating compliance monitoring, managing risks, and generating audit reports.
                Governance, Risk, and Compliance (GRC) platforms provide a centralized system to track security policies,
                compliance requirements, and risk assessments. Security Information and Event Management (SIEM) systems help
                organizations monitor, detect, and report security incidents in real time to ensure compliance with incident
                response regulations. Cloud Security Posture Management (CSPM) solutions enforce security policies in cloud
                environments to maintain regulatory alignment. Data Loss Prevention (DLP) tools help organizations comply
                with
                data protection laws by preventing unauthorized data access and sharing. Automated Compliance Auditing Tools
                generate reports on security control effectiveness and regulatory adherence. By leveraging these
                technologies,
                organizations can ensure continuous compliance, avoid regulatory penalties, and strengthen cybersecurity
                governance.</p>

            <h3>2. Basic Concepts of Regulatory Compliance in Cybersecurity</h3>
            <p>Regulatory Compliance in cybersecurity refers to adhering to laws, regulations, and industry standards
                designed
                to protect sensitive information, maintain data integrity, and ensure the security of digital systems.
                Various
                governments and regulatory bodies enforce cybersecurity compliance to safeguard organizations from cyber
                threats, data breaches, and financial fraud. Failure to comply can result in legal penalties, reputational
                damage, and financial losses.</p>
            <p>Organizations must follow specific compliance frameworks based on their industry and geographical location.
                For
                example, GDPR (General Data Protection Regulation) applies to data privacy in the European Union, while
                HIPAA
                (Health Insurance Portability and Accountability Act) governs healthcare data in the United States. Other
                key
                regulatory frameworks include ISO 27001, NIST Cybersecurity Framework, PCI DSS (for payment systems), and
                SOC 2
                (for service providers). These regulations define security controls, data protection measures, and incident
                response protocols that organizations must implement.</p>
            <p>Maintaining regulatory compliance requires continuous monitoring, regular audits, employee training, and
                updating
                security policies in line with evolving threats and regulatory updates. Organizations use compliance
                management
                tools and automated reporting systems to track compliance status and ensure adherence. By integrating
                regulatory
                compliance into their cybersecurity strategy, businesses can mitigate legal risks, enhance customer trust,
                and
                strengthen overall cybersecurity resilience.</p>
            <h3>3. Key Performance Indicators (KPIs) in Regulatory Compliance</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Compliance Audit Completion Rate</x-table.td>
                        <x-table.td>Measures the percentage of completed regulatory compliance audits.</x-table.td>
                        <x-table.td>Annually (NCA Compliance)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Policy Adherence Rate</x-table.td>
                        <x-table.td>Tracks the percentage of employees following cybersecurity policies.</x-table.td>
                        <x-table.td>Quarterly (NCA Governance)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Security Incident Reporting Compliance</x-table.td>
                        <x-table.td>Assesses adherence to reporting requirements for security incidents.</x-table.td>
                        <x-table.td>Monthly (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Compliance Score</x-table.td>
                        <x-table.td>Measures compliance of cloud infrastructure with regulatory policies.</x-table.td>
                        <x-table.td>Quarterly (NCA Cloud Security)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Protection Compliance Rate</x-table.td>
                        <x-table.td>Evaluates adherence to data security and privacy regulations.</x-table.td>
                        <x-table.td>Annually (NCA Data Security)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Regulatory Compliance Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Governance, Risk, and Compliance (GRC) Platforms</x-table.td>
                        <x-table.td>Tracks compliance requirements and automates regulatory reporting.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Security Information & Event Management (SIEM)</x-table.td>
                        <x-table.td>Monitors security incidents and ensures compliance with reporting
                            standards.</x-table.td>
                        <x-table.td>NCA Incident Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Posture Management (CSPM)</x-table.td>
                        <x-table.td>Enforces security configurations and compliance in cloud environments.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP)</x-table.td>
                        <x-table.td>Prevents unauthorized access and sharing of sensitive data.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Automated Compliance Auditing Tools</x-table.td>
                        <x-table.td>Generates reports on regulatory compliance and security controls.</x-table.td>
                        <x-table.td>NCA Cybersecurity Compliance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Identity and Access Management (IAM)</x-table.td>
                        <x-table.td>Ensures that only authorized personnel access critical systems.</x-table.td>
                        <x-table.td>NCA Identity & Access Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Vulnerability Management Systems</x-table.td>
                        <x-table.td>Identifies and mitigates security vulnerabilities to maintain compliance.</x-table.td>
                        <x-table.td>NCA Vulnerability Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Endpoint Detection & Response (EDR)</x-table.td>
                        <x-table.td>Ensures compliance with endpoint security policies.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Penetration Testing (PT) Tools</x-table.td>
                        <x-table.td>Simulates attacks to verify security controls and compliance.</x-table.td>
                        <x-table.td>NCA Penetration Testing</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Configuration Management</x-table.td>
                        <x-table.td>Enforces regulatory compliance for system and network configurations.</x-table.td>
                        <x-table.td>NCA Configuration Management</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Regulatory compliance is essential for organizations to ensure alignment with national and international
                cybersecurity laws, prevent legal penalties, and enhance security resilience. Implementing GRC platforms,
                SIEM
                solutions, CSPM tools, and automated compliance auditing systems allows organizations to continuously
                monitor,
                enforce, and report on compliance requirements. Key performance indicators (KPIs) such as audit completion
                rates
                and security policy adherence help organizations measure their compliance effectiveness. By adhering to NCA
                cybersecurity frameworks, organizations can build a strong security posture, protect sensitive data, and
                ensure
                operational integrity while meeting regulatory obligations.</p>
        </article>
    </div>
@endsection
