@extends('layouts.process')
@section('title', 'Cyber Security in Project Management')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security in Project Management">
                To ensure that the all the Member Organization’s projects meet cyber security requirements
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
            <h1>Cyber Security in Project Management</h1>
        </header>
        <article>
            <h3>1. Description of the Cybersecurity Governance Technologies:</h3>
            <p>Cybersecurity in project management technologies ensures that security is integrated throughout the project
                lifecycle, from initiation to closure. These technologies help organizations identify risks, enforce
                security
                policies, and maintain compliance with frameworks like the NCA Essential Cybersecurity Controls (ECC).
                Governance, Risk, and Compliance (GRC) platforms assist project managers in tracking security requirements,
                policies, and risk assessments. Threat Modeling Tools enable teams to identify potential vulnerabilities in
                applications and systems before deployment. Secure Software Development Lifecycle (SDLC) Tools ensure that
                security is embedded into software projects from the design phase. Cloud Security Posture Management (CSPM)
                solutions provide continuous compliance monitoring for cloud-based projects. Automated Security Testing
                Tools,
                such as Static and Dynamic Application Security Testing (SAST & DAST), help detect vulnerabilities early in
                the
                development cycle. Additionally, Identity and Access Management (IAM) solutions regulate access controls for
                project teams, ensuring that only authorized personnel handle sensitive project data. By leveraging these
                technologies, organizations can proactively manage cybersecurity risks within project management frameworks.
            </p>


            <h3>2. Basic Concepts of Cyber Security in Project Management</h3>
            <p>Cybersecurity plays a critical role in project management, ensuring that projects are executed securely while
                protecting sensitive data, intellectual property, and IT infrastructure. As organizations adopt digital
                tools,
                cloud computing, and remote collaboration, cybersecurity must be integrated into every phase of project
                management. This includes risk assessment, secure communication, compliance with industry regulations, and
                continuous monitoring of potential cyber threats.</p>
            <p>A fundamental aspect of cybersecurity in project management is risk identification and mitigation. Every
                project
                involves handling data, using digital tools, and managing access to critical systems. Cyber risks such as
                unauthorized access, data breaches, and malware attacks must be assessed at the beginning of the project.
                Implementing strong authentication mechanisms, role-based access control (RBAC), and secure coding practices
                can
                help minimize vulnerabilities. Additionally, organizations should conduct regular security audits and
                penetration testing to ensure compliance with cybersecurity policies.</p>
            <p>Another crucial component is secure collaboration and third-party management. Many projects involve working
                with
                external vendors, contractors, or cloud-based service providers, increasing the risk of supply chain
                attacks.
                Organizations should enforce strict vendor security policies, contractual agreements with cybersecurity
                clauses,
                and secure data-sharing practices to mitigate risks. Cybersecurity awareness training for project teams is
                also
                essential to ensure that all stakeholders understand their roles and responsibilities in safeguarding
                project
                data. By integrating cybersecurity best practices into project management methodologies such as Agile,
                DevOps,
                and PRINCE2, organizations can enhance resilience and ensure secure project execution</p>

            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity in Project Management</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Security Risk Assessment Completion</x-table.td>
                        <x-table.td>Measures how often security risk assessments are conducted in projects.</x-table.td>
                        <x-table.td>Annually (NCA-ECC-1-5-1)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance with Secure Development Practices</x-table.td>
                        <x-table.td>Percentage of projects following secure development lifecycle guidelines.</x-table.td>
                        <x-table.td>Quarterly (NCA Cybersecurity)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Readiness in Projects</x-table.td>
                        <x-table.td>Assesses the project team's ability to respond to security incidents.</x-table.td>
                        <x-table.td>Bi-Annually (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Code Review Coverage</x-table.td>
                        <x-table.td>Percentage of project code reviewed for security vulnerabilities.</x-table.td>
                        <x-table.td>Monthly (NCA SDLC Guidelines)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Access Control Compliance in Projects</x-table.td>
                        <x-table.td>Measures adherence to IAM policies for project team members.</x-table.td>
                        <x-table.td>Quarterly (NCA-ECC-2-2-1)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity in Project Management Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Governance, Risk, and Compliance (GRC)</x-table.td>
                        <x-table.td>Manages security policies and risk assessments in projects.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Threat Modeling Tools</x-table.td>
                        <x-table.td>Identifies potential cybersecurity risks early in project planning.</x-table.td>
                        <x-table.td>NCA Risk Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure SDLC Tools</x-table.td>
                        <x-table.td>Ensures security is embedded throughout the development lifecycle.</x-table.td>
                        <x-table.td>NCA Cybersecurity Development</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Static Application Security Testing (SAST)</x-table.td>
                        <x-table.td>Analyzes source code for security vulnerabilities before deployment.</x-table.td>
                        <x-table.td>NCA Secure Coding Practices</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Dynamic Application Security Testing (DAST)</x-table.td>
                        <x-table.td>Detects security flaws during runtime testing of applications.</x-table.td>
                        <x-table.td>NCA Application Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cloud Security Posture Management (CSPM)</x-table.td>
                        <x-table.td>Ensures compliance and security for cloud-based project deployments.</x-table.td>
                        <x-table.td>NCA Cloud Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Identity and Access Management (IAM)</x-table.td>
                        <x-table.td>Manages user access and enforces role-based security policies.</x-table.td>
                        <x-table.td>NCA Identity & Access Mgmt</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Security Incident & Event Management (SIEM)</x-table.td>
                        <x-table.td>Provides real-time monitoring and response to security incidents.</x-table.td>
                        <x-table.td>NCA Cybersecurity Defense</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Data Loss Prevention (DLP) Tools</x-table.td>
                        <x-table.td>Prevents unauthorized data sharing and leakage within projects.</x-table.td>
                        <x-table.td>NCA Data Cybersecurity Controls</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Penetration Testing (PT) Tools</x-table.td>
                        <x-table.td>Simulates cyberattacks to identify weaknesses in project environments.</x-table.td>
                        <x-table.td>NCA Penetration Testing</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Integrating cybersecurity into project management is essential for ensuring secure development, mitigating
                risks,
                and complying with national cybersecurity standards like NCA ECC, CSCC, and CCC. Organizations must adopt
                GRC
                platforms, threat modeling tools, IAM solutions, and automated security testing tools to embed security from
                the
                initiation phase to project closure. Key performance indicators (KPIs) help measure security effectiveness
                in
                projects, ensuring compliance with secure coding, risk assessments, and incident response preparedness. By
                embedding cybersecurity best practices, leveraging advanced security tools, and fostering a security-first
                mindset, organizations can reduce vulnerabilities, enhance resilience, and achieve successful, secure
                project
                outcomes while aligning with regulatory requirements.</p>
        </article>
    </div>
@endsection
