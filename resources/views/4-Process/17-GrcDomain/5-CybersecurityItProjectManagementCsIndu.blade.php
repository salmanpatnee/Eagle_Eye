@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Cyber Security in Project Management</h3>
    <p>To ensure that the all the Member Organization’s projects meet cyber security requirements.</p>
@endsection
@section('boxes')
    <div class="rowsec">
        <div id="VideoExplanation">
            <div class="itemsec">
                <i class='bx bxs-videos'></i>
                <p>Video Explanation</p>
            </div>
        </div>
        <div>
            <div class="itemsec">
                <div>
                    <div id="ImplementationDocs">
                        <i class='bx bxs-file-doc'></i>
                    </div>
                    <div id="ImplementationPdf">
                        <i class='bx bxs-file-pdf'></i>
                    </div>
                </div>
                <p>Implementation Templates</p>
            </div>
        </div>
    </div>
    <div class="rowsec">
        <div id="Checklist">
            <div class="itemsec">
                <i class='bx bxs-file'></i>
                <p>Checklist for CISO</p>
            </div>
        </div>
        <div id="Glossary">
            <div class="itemsec">
                <img class="imgicon" src="/Images/8-TransIcon.png">
                <p>Arabic English Glossary</p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <header class="text-center">
        <h1>Cyber Security in Project Management</h1>
    </header>
    <article>
        <h3>1. Description of the Cybersecurity Governance Technologies:</h3>
        <p>Cybersecurity in project management technologies ensures that security is integrated throughout the project
            lifecycle, from initiation to closure. These technologies help organizations identify risks, enforce security
            policies, and maintain compliance with frameworks like the NCA Essential Cybersecurity Controls (ECC).
            Governance, Risk, and Compliance (GRC) platforms assist project managers in tracking security requirements,
            policies, and risk assessments. Threat Modeling Tools enable teams to identify potential vulnerabilities in
            applications and systems before deployment. Secure Software Development Lifecycle (SDLC) Tools ensure that
            security is embedded into software projects from the design phase. Cloud Security Posture Management (CSPM)
            solutions provide continuous compliance monitoring for cloud-based projects. Automated Security Testing Tools,
            such as Static and Dynamic Application Security Testing (SAST & DAST), help detect vulnerabilities early in the
            development cycle. Additionally, Identity and Access Management (IAM) solutions regulate access controls for
            project teams, ensuring that only authorized personnel handle sensitive project data. By leveraging these
            technologies, organizations can proactively manage cybersecurity risks within project management frameworks.</p>


            <h3>2. Basic Concepts of Cyber Security in Project Management</h3>
            <p>Cybersecurity plays a critical role in project management, ensuring that projects are executed securely while protecting sensitive data, intellectual property, and IT infrastructure. As organizations adopt digital tools, cloud computing, and remote collaboration, cybersecurity must be integrated into every phase of project management. This includes risk assessment, secure communication, compliance with industry regulations, and continuous monitoring of potential cyber threats.</p>
            <p>A fundamental aspect of cybersecurity in project management is risk identification and mitigation. Every project involves handling data, using digital tools, and managing access to critical systems. Cyber risks such as unauthorized access, data breaches, and malware attacks must be assessed at the beginning of the project. Implementing strong authentication mechanisms, role-based access control (RBAC), and secure coding practices can help minimize vulnerabilities. Additionally, organizations should conduct regular security audits and penetration testing to ensure compliance with cybersecurity policies.</p>
            <p>Another crucial component is secure collaboration and third-party management. Many projects involve working with external vendors, contractors, or cloud-based service providers, increasing the risk of supply chain attacks. Organizations should enforce strict vendor security policies, contractual agreements with cybersecurity clauses, and secure data-sharing practices to mitigate risks. Cybersecurity awareness training for project teams is also essential to ensure that all stakeholders understand their roles and responsibilities in safeguarding project data. By integrating cybersecurity best practices into project management methodologies such as Agile, DevOps, and PRINCE2, organizations can enhance resilience and ensure secure project execution</p>
        
            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity in Project Management</h3>
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
                    <td>Security Risk Assessment Completion</td>
                    <td>Measures how often security risk assessments are conducted in projects.</td>
                    <td>Annually (NCA-ECC-1-5-1)</td>
                </tr>
                <tr>
                    <td>Compliance with Secure Development Practices</td>
                    <td>Percentage of projects following secure development lifecycle guidelines.</td>
                    <td>Quarterly (NCA Cybersecurity)</td>
                </tr>
                <tr>
                    <td>Incident Response Readiness in Projects</td>
                    <td>Assesses the project team's ability to respond to security incidents.</td>
                    <td>Bi-Annually (NCA Incident Mgmt)</td>
                </tr>
                <tr>
                    <td>Secure Code Review Coverage</td>
                    <td>Percentage of project code reviewed for security vulnerabilities.</td>
                    <td>Monthly (NCA SDLC Guidelines)</td>
                </tr>
                <tr>
                    <td>Access Control Compliance in Projects</td>
                    <td>Measures adherence to IAM policies for project team members.</td>
                    <td>Quarterly (NCA-ECC-2-2-1)</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Cybersecurity in Project Management Products</h3>
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
                    <td>Governance, Risk, and Compliance (GRC)</td>
                    <td>Manages security policies and risk assessments in projects.</td>
                    <td>NCA Cybersecurity Governance</td>
                </tr>
                <tr>
                    <td>Threat Modeling Tools</td>
                    <td>Identifies potential cybersecurity risks early in project planning.</td>
                    <td>NCA Risk Management</td>
                </tr>
                <tr>
                    <td>Secure SDLC Tools</td>
                    <td>Ensures security is embedded throughout the development lifecycle.</td>
                    <td>NCA Cybersecurity Development</td>
                </tr>
                <tr>
                    <td>Static Application Security Testing (SAST)</td>
                    <td>Analyzes source code for security vulnerabilities before deployment.</td>
                    <td>NCA Secure Coding Practices</td>
                </tr>
                <tr>
                    <td>Dynamic Application Security Testing (DAST)</td>
                    <td>Detects security flaws during runtime testing of applications.</td>
                    <td>NCA Application Security</td>
                </tr>
                <tr>
                    <td>Cloud Security Posture Management (CSPM)</td>
                    <td>Ensures compliance and security for cloud-based project deployments.</td>
                    <td>NCA Cloud Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Identity and Access Management (IAM)</td>
                    <td>Manages user access and enforces role-based security policies.</td>
                    <td>NCA Identity & Access Mgmt</td>
                </tr>
                <tr>
                    <td>Security Incident & Event Management (SIEM)</td>
                    <td>Provides real-time monitoring and response to security incidents.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention (DLP) Tools</td>
                    <td>Prevents unauthorized data sharing and leakage within projects.</td>
                    <td>NCA Data Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Penetration Testing (PT) Tools</td>
                    <td>Simulates cyberattacks to identify weaknesses in project environments.</td>
                    <td>NCA Penetration Testing</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>Integrating cybersecurity into project management is essential for ensuring secure development, mitigating risks,
            and complying with national cybersecurity standards like NCA ECC, CSCC, and CCC. Organizations must adopt GRC
            platforms, threat modeling tools, IAM solutions, and automated security testing tools to embed security from the
            initiation phase to project closure. Key performance indicators (KPIs) help measure security effectiveness in
            projects, ensuring compliance with secure coding, risk assessments, and incident response preparedness. By
            embedding cybersecurity best practices, leveraging advanced security tools, and fostering a security-first
            mindset, organizations can reduce vulnerabilities, enhance resilience, and achieve successful, secure project
            outcomes while aligning with regulatory requirements.</p>
    </article>
@endsection