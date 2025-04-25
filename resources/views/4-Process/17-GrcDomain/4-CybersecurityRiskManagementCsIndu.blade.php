@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>Cybersecurity Roles and Responsibilities</h3>
    <p>Responsibilities to implement, maintain, support and promote cybersecurity should be defined
        throughout the Member Organization. Additionally, all parties involved in cybersecurity should
        understand and take their role and responsibilities.</p>
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
        <h1>Cybersecurity Roles and Responsibilities</h1>
    </header>
    <article>
        <h3>1. Description of Cybersecurity Roles and Responsibilities Technologies:</h3>
        <p>Cybersecurity roles and responsibilities technologies help organizations define, enforce, and monitor security
            responsibilities across various teams and stakeholders. These technologies include Identity and Access
            Management (IAM) systems, which ensure that users have appropriate access based on their roles and privileges,
            enforcing the principle of least privilege. Governance, Risk, and Compliance (GRC) platforms help define
            cybersecurity roles, track responsibilities, and monitor compliance with national frameworks such as the NCA
            Essential Cybersecurity Controls (ECC). Security Information and Event Management (SIEM) systems provide
            visibility into security incidents and allow cybersecurity teams to fulfill their monitoring and response roles
            effectively. Role-Based Access Control (RBAC) solutions enforce access policies based on user roles, ensuring
            that only authorized personnel access critical resources. Cybersecurity Training and Awareness Platforms ensure
            that employees are educated about their cybersecurity responsibilities. Additionally, Incident Response and
            Forensics Tools help security teams manage breaches and analyze incidents effectively. These technologies
            collectively enable organizations to maintain well-defined cybersecurity responsibilities, ensuring that all
            stakeholders fulfill their designated roles effectively.</p>

        <h3>2. Basic Concepts of Cybersecurity Roles and Responsibilities</h3>
        <p>Technology is the application of scientific knowledge to create tools, systems, and solutions that improve human
            life and business operations. It encompasses hardware, software, networks, and data management, all working
            together to enable digital transformation. In cybersecurity, technology plays a crucial role in protecting
            sensitive information, ensuring business continuity, and mitigating cyber threats. With the rise of artificial
            intelligence (AI), cloud computing, and automation, organizations are leveraging technology to enhance security
            frameworks and streamline operations.</p>
        <p>One fundamental concept of technology is networking and connectivity. The internet, local area networks (LANs),
            and cloud infrastructure allow devices to communicate and exchange data. Secure communication protocols such as
            HTTPS, VPNs, and encryption standards ensure that data remains protected from cyber threats. Organizations must
            implement strong firewalls, intrusion detection systems (IDS), and endpoint security to safeguard their network
            against unauthorized access and cyberattacks. Without a secure and well-structured network, businesses risk
            exposing critical data to hackers.</p>
        <p>Another essential aspect of technology is data storage and processing. Modern organizations rely on databases,
            cloud storage, and big data analytics to manage vast amounts of information. Technologies such as blockchain,
            distributed storage, and AI-driven analytics help in securing and optimizing data management. In cybersecurity,
            data encryption, access control, and backup strategies are essential to prevent data breaches and ensure
            compliance with regulations like NCA Cybersecurity Standards, GDPR, and ISO 27001. As digital threats evolve,
            organizations must continuously update their security measures to protect their data assets.</p>

        <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Roles and Responsibilities</h3>
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
                    <td>Role-Based Access Compliance</td>
                    <td>Percentage of employees assigned the correct access based on their roles.</td>
                    <td>Monthly (NCA-ECC-2-2-1)</td>
                </tr>
                <tr>
                    <td>Cybersecurity Roles Review</td>
                    <td>Frequency of reviewing and updating security roles and responsibilities.</td>
                    <td>Annually (NCA-ECC-1-4-2)</td>
                </tr>
                <tr>
                    <td>Incident Response Role Efficiency</td>
                    <td>Measures how quickly cybersecurity teams respond to security incidents.</td>
                    <td>Quarterly (NCA Incident Mgmt)</td>
                </tr>
                <tr>
                    <td>Compliance with Cybersecurity Training</td>
                    <td>Percentage of employees trained on their cybersecurity roles.</td>
                    <td>Quarterly (NCA-ECC-1-10-3)</td>
                </tr>
                <tr>
                    <td>Security Policy Adherence</td>
                    <td>Percentage of employees following cybersecurity policies and guidelines.</td>
                    <td>Annually (NCA Compliance Mgmt)</td>
                </tr>
            </tbody>
        </table>
        <h3>4. Cybersecurity Roles and Responsibilities Products</h3>
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
                    <td>Identity and Access Management (IAM)</td>
                    <td>Manages user access and enforces least privilege policies.</td>
                    <td>NCA-ECC-2-2-1</td>
                </tr>
                <tr>
                    <td>Governance, Risk, and Compliance (GRC)</td>
                    <td>Defines and tracks security roles and responsibilities.</td>
                    <td>NCA Cybersecurity Governance</td>
                </tr>
                <tr>
                    <td>Security Information & Event Management (SIEM)</td>
                    <td>Monitors and detects security incidents in real-time.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Role-Based Access Control (RBAC)</td>
                    <td>Ensures employees only have access to necessary resources.</td>
                    <td>NCA Identity & Access Mgmt</td>
                </tr>
                <tr>
                    <td>Cybersecurity Training Platforms</td>
                    <td>Educates employees on their security responsibilities.</td>
                    <td>NCA Cybersecurity Awareness</td>
                </tr>
                <tr>
                    <td>Incident Response & Forensics Tools</td>
                    <td>Helps security teams manage breaches and investigate incidents.</td>
                    <td>NCA Incident Management</td>
                </tr>
                <tr>
                    <td>Data Loss Prevention (DLP)</td>
                    <td>Ensures that employees follow data protection policies.</td>
                    <td>NCA Data Cybersecurity Controls</td>
                </tr>
                <tr>
                    <td>Vulnerability Management Systems</td>
                    <td>Assigns security roles to manage vulnerabilities and patching.</td>
                    <td>NCA Vulnerability Management</td>
                </tr>
                <tr>
                    <td>Endpoint Detection & Response (EDR)</td>
                    <td>Ensures security teams can monitor and respond to endpoint threats.</td>
                    <td>NCA Cybersecurity Defense</td>
                </tr>
                <tr>
                    <td>Network Access Control (NAC)</td>
                    <td>Enforces access policies based on roles and device security posture.</td>
                    <td>NCA Network Security</td>
                </tr>
            </tbody>
        </table>
        <h3>5. Summary</h3>
        <p>Clearly defined cybersecurity roles and responsibilities are essential for an organization’s security posture and
            compliance with national standards such as NCA Essential Cybersecurity Controls (ECC), NCA Cloud Cybersecurity
            Controls (CCC), and NCA Critical Cybersecurity Controls (CSCC). Organizations must leverage technologies such as
            IAM, SIEM, GRC, and RBAC solutions to ensure that employees have appropriate access, security teams can monitor
            threats, and all personnel are aware of their cybersecurity duties. Key performance indicators (KPIs) help
            measure compliance and effectiveness in role execution. By implementing the right technologies, training
            employees, and monitoring adherence to security policies, organizations can strengthen their cyber resilience,
            minimize security risks, and align with national cybersecurity frameworks.</p>
    </article>
@endsection
