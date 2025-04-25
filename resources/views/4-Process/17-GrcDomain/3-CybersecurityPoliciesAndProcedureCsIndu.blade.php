@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Cybersecurity Policy</h3>
    <p>To document the Member Organization’s commitment and objectives of cyber security, and to
        communicate this to the relevant stakeholders. </p>
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
        <h1>Cybersecurity Policy</h1>
    </header>
    <article>
        <h3>1. Description of Cybersecurity Policy Technologies:</h3>
        <p>Cybersecurity policy technologies provide organizations with the tools to define, enforce, and monitor security
            policies to ensure compliance with frameworks such as the NCA Essential Cybersecurity Controls (ECC) and related
            standards. These technologies include Governance, Risk, and Compliance (GRC) platforms, which automate policy
            enforcement, compliance tracking, and reporting. Identity and Access Management (IAM) solutions enforce policies
            related to authentication, authorization, and user privileges, ensuring that only authorized personnel access
            critical systems. Security Information and Event Management (SIEM) systems help in monitoring security logs and
            detecting policy violations in real time. Data Loss Prevention (DLP) solutions ensure that sensitive information
            is handled according to policy guidelines, preventing unauthorized data sharing. Endpoint Protection Platforms
            (EPP) and Network Access Control (NAC) solutions enforce device security policies, ensuring that endpoints meet
            compliance requirements before accessing corporate networks. Together, these technologies provide a structured
            approach to enforcing cybersecurity policies, mitigating risks, and ensuring regulatory compliance.</p>

        <h3>2. Basic Concepts of Cybersecurity Policy</h3>
        <p>A cybersecurity policy is a formal set of guidelines that define how an organization protects its digital assets,
            sensitive data, and IT infrastructure. It establishes security rules, responsibilities, and procedures to
            prevent unauthorized access, data breaches, and cyber threats. Organizations following NCA Essential
            Cybersecurity Controls, Critical Cybersecurity Controls, and Cloud Cybersecurity Controls ensure that their
            policies align with national and international security regulations.</p>
        <p>A strong cybersecurity policy covers key areas such as access control, data protection, incident response, and
            user behavior. It defines security roles and responsibilities for employees, IT staff, and third-party vendors.
            Policies on password management, multi-factor authentication (MFA), encryption, and endpoint security are
            included to ensure robust protection. Additionally, organizations implement BYOD (Bring Your Own Device)
            security guidelines, limiting the risks associated with personal devices accessing corporate networks.</p>
        <p>Regular updates and audits of cybersecurity policies help organizations stay ahead of evolving threats. Policies
            should include security awareness training to educate employees on phishing, ransomware, and social engineering
            attacks. Compliance with NCA Cybersecurity Standards ensures adherence to legal and industry-specific
            regulations. A well-structured cybersecurity policy serves as a foundation for an organization’s security
            framework, helping mitigate risks and strengthen overall cyber resilience.</p>

        <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Policy</h3>
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
                    <td>Cybersecurity Policy Review</td>
                    <td>Measures how often cybersecurity policies are updated and reviewed.</td>
                    <td>Annually (NCA-ECC-1-3-1)</td>
                </tr>
                <tr>
                    <td>Policy Compliance Rate</td>
                    <td>Percentage of staff and systems compliant with security policies.</td>
                    <td>Quarterly (NCA Compliance Mgmt)</td>
                </tr>
                <tr>
                    <td>Incident Response Adherence</td>
                    <td>Measures compliance with cybersecurity incident response policies.</td>
                    <td>Quarterly (NCA Incident Mgmt)</td>
                </tr>
                <tr>
                    <td>Access Control Compliance</td>
                    <td>Tracks adherence to IAM policies and access control standards.</td>
                    <td>Monthly (NCA-ECC-2-2-1)</td>
                </tr>
                <tr>
                    <td>Security Awareness Program Coverage</td>
                    <td>Percentage of employees trained in cybersecurity policies and threats.</td>
                    <td>Quarterly (NCA-ECC-1-10-3)</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Cybersecurity Policy Products</h3>
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
                    <td>Manages policy documentation, enforcement, and compliance tracking.</td>
                    <td>NCA Cybersecurity Governance</td>
                </tr>
                <tr>
                    <td>Identity and Access Management (IAM)</td>
                    <td>Enforces policies for user authentication and role-based access control.</td>
                    <td>NCA-ECC-1-2-1</td>
                </tr>
                <tr>
                    <td>Security Information & Event Management (SIEM)</td>
                    <td>Monitors security events and detects policy violations.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention (DLP)</td>
                    <td>Prevents unauthorized access and sharing of sensitive data.</td>
                    <td>NCA Data Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Endpoint Protection Platforms (EPP)</td>
                    <td>Ensures endpoint devices comply with security policies.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Network Access Control (NAC)</td>
                    <td>Enforces network security policies for connected devices.</td>
                    <td>NCA Network Security</td>
                </tr>
                <tr>
                    <td>Cloud Security Posture Management (CSPM)</td>
                    <td>Ensures cloud security policies align with NCA Cloud Cybersecurity Controls.</td>
                    <td>NCA Cloud Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Vulnerability Management Platforms</td>
                    <td>Detects and manages compliance with security patching policies.</td>
                    <td>NCA Vulnerability Management</td>
                </tr>
                <tr>
                    <td>Incident Response and Forensics Tools</td>
                    <td>Enforces policies related to incident response and forensic analysis.</td>
                    <td>NCA Incident Management</td>
                </tr>
                <tr>
                    <td>Security Awareness Training Platforms</td>
                    <td>Ensures compliance with employee cybersecurity awareness policies.</td>
                    <td>NCA Cybersecurity Awareness</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>A well-defined cybersecurity policy is essential for ensuring a secure and compliant IT environment.
            Organizations must implement GRC platforms, IAM solutions, SIEM systems, and DLP tools to enforce security
            policies, monitor compliance, and mitigate risks. Key performance indicators (KPIs) help organizations measure
            policy effectiveness, ensuring continuous improvement. The NCA Essential Cybersecurity Controls (ECC), NCA Cloud
            Cybersecurity Controls, and NCA Critical Cybersecurity Controls provide a framework for policy implementation.
            By leveraging the right technologies and maintaining compliance with cybersecurity policies, organizations can
            protect their digital assets, prevent data breaches, and align with national cybersecurity standards.</p>
    </article>
@endsection
