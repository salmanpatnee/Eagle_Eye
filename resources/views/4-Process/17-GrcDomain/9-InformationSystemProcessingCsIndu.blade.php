@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Human Resources</h3>
    <p>To ensure that Member Organization staff’s cyber security responsibilities are embedded in staff
        agreements and staff are being screened before and during their employment lifecycle.</p>
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
        <h1>Human Resources</h1>
    </header>
    <article>
        <h3>1. Description of Human Resources Technologies:</h3>
        <p>Human Resources (HR) technologies play a vital role in managing employee lifecycle processes, ensuring
            compliance, and enforcing cybersecurity policies within an organization. These technologies include Human
            Resource Management Systems (HRMS), which automate HR functions such as recruitment, employee records
            management, payroll, and compliance tracking. Identity and Access Management (IAM) solutions ensure that
            employees have appropriate access rights based on their roles, following the principle of least privilege.
            Security Awareness and Training Platforms educate employees on cybersecurity policies and threats, ensuring
            compliance with frameworks such as NCA Essential Cybersecurity Controls (ECC). Privileged Access Management
            (PAM) tools regulate access to critical systems, reducing the risk of insider threats. Background Screening and
            Employee Onboarding Systems verify employee credentials, ensuring security clearance for sensitive roles.
            Additionally, Data Loss Prevention (DLP) tools monitor and restrict unauthorized data transfers, protecting
            sensitive HR information. By integrating cybersecurity with HR technologies, organizations can enhance security,
            enforce policies, and mitigate insider threats.</p>

        <h3>2. Basic Concepts of Human Resources </h3>
        <p>Human Resources (HR) plays a crucial role in cybersecurity by ensuring that employees understand security
            policies, follow best practices, and contribute to a secure organizational environment. Since employees are
            often the first line of defense against cyber threats, HR departments must integrate cybersecurity awareness
            into hiring, training, and daily operations.</p>
        <p>One of the key responsibilities of HR in cybersecurity is background verification. Before hiring, companies must
            conduct thorough background checks to ensure that new employees do not pose a security risk. Additionally, HR is
            responsible for onboarding and training employees on security policies, such as password management, data
            protection, and phishing awareness. This ensures that staff members recognize potential cyber threats and
            respond appropriately.</p>
        <p>HR also plays a role in access management, ensuring that employees have the correct level of access to sensitive
            information based on their job roles. When an employee leaves the organization, HR and IT teams must work
            together to revoke access promptly to prevent unauthorized access to company data. Moreover, HR must enforce
            strict policies for remote work, bring-your-own-device (BYOD) usage, and social media interactions to minimize
            security risks.</p>
        <p>By incorporating cybersecurity best practices into HR policies, organizations can reduce insider threats,
            strengthen their security posture, and ensure compliance with cybersecurity regulations. A well-trained
            workforce is one of the strongest defenses against cyberattacks, making HR a vital component of an
            organization’s overall cybersecurity strategy.</p>

        <h3>3. Key Performance Indicators (KPIs) in Human Resources and Cybersecurity</h3>
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
                    <td>Employee Security Training Completion Rate</td>
                    <td>Measures the percentage of employees who have completed cybersecurity awareness training.</td>
                    <td>Quarterly (NCA-ECC-1-10-3)</td>
                </tr>
                <tr>
                    <td>HR System Access Control Compliance</td>
                    <td>Tracks the enforcement of role-based access control in HR systems.</td>
                    <td>Monthly (NCA IAM Standards)</td>
                </tr>
                <tr>
                    <td>Insider Threat Incident Rate</td>
                    <td>Measures the number of security incidents caused by employees.</td>
                    <td>Bi-Annually (NCA Threat Mgmt)</td>
                </tr>
                <tr>
                    <td>Background Screening Compliance</td>
                    <td>Percentage of employees who have undergone security background checks..</td>
                    <td>Annually (NCA Cybersecurity Governance)</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention Policy Compliance</td>
                    <td>Monitors HR data security policies to prevent unauthorized data access.</td>
                    <td>Quarterly (NCA Data Security)</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Human Resources and Cybersecurity Products</h3>
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
                    <td>Human Resource Management Systems (HRMS)</td>
                    <td>Manages employee data, recruitment, payroll, and compliance tracking.</td>
                    <td>NCA HR Security & Compliance</td>
                </tr>
                <tr>
                    <td>Identity and Access Management (IAM)</td>
                    <td>Enforces role-based access control for HR systems and sensitive data.</td>
                    <td>NCA-ECC-2-2-1</td>
                </tr>
                <tr>
                    <td>Security Awareness and Training Platforms</td>
                    <td>Educates employees on cybersecurity best practices.</td>
                    <td>NCA Cybersecurity Awareness</td>
                </tr>
                <tr>
                    <td>Privileged Access Management (PAM)</td>
                    <td>Controls access to sensitive HR records and administrative functions.</td>
                    <td>NCA Identity & Access Mgmt</td>
                </tr>
                <tr>
                    <td>Background Screening & Onboarding Systems</td>
                    <td>Verifies employee credentials and ensures security clearance.</td>
                    <td>NCA HR Governance</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention (DLP)</td>
                    <td>Prevents unauthorized access and sharing of sensitive employee data.</td>
                    <td>NCA Data Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Endpoint Detection & Response (EDR)</td>
                    <td>Monitors HR systems for security threats and potential breaches.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Secure Document Management Systems</td>
                    <td>Ensures HR documents are stored securely and accessed only by authorized personnel.</td>
                    <td>NCA Data Protection</td>
                </tr>
                <tr>
                    <td>Employee Exit and Access Revocation Tools</td>
                    <td>Automates access revocation for departing employees.</td>
                    <td>NCA Identity & Access Mgmt</td>
                </tr>
                <tr>
                    <td>Compliance Management Systems</td>
                    <td>Tracks adherence to HR cybersecurity policies and regulatory compliance.</td>
                    <td>NCA Compliance Management</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>Human Resources (HR) plays a critical role in maintaining cybersecurity compliance, enforcing access controls,
            and mitigating insider threats. Organizations must implement HRMS, IAM, PAM, and security training platforms to
            ensure secure employee onboarding, role-based access control, and data protection. Key performance indicators
            (KPIs) such as training completion rates, access control compliance, and insider threat incident rates help
            measure the effectiveness of HR cybersecurity practices. By adhering to NCA cybersecurity frameworks,
            organizations can protect employee data, reduce security risks, and ensure compliance with national regulations.
            A strong integration between HR and cybersecurity enhances organizational security, reduces insider threats, and
            builds a security-aware workforce, ensuring a safe and resilient business environment.</p>
    </article>
@endsection
