@extends('layouts.process')
@section('title', 'Cyber Security Awareness')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security Awareness">
                To create a cyber security risk-aware culture where the Member Organization’s staff, third parties and
                customers make effective risk-based decisions which protect the Member Organization’s information.
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
            <h1>Cyber Security Awareness</h1>
        </header>
        <article>
            <h3>1. Description of Cybersecurity Awareness Technologies:</h3>
            <p>Cybersecurity awareness technologies are essential for educating employees, stakeholders, and management on
                best
                practices, emerging threats, and compliance with security frameworks such as the NCA Essential Cybersecurity
                Controls (ECC). These technologies include Learning Management Systems (LMS), which provide structured
                cybersecurity training modules, and Phishing Simulation Platforms, which test employees’ ability to detect
                phishing attacks. Security Awareness Training Platforms deliver interactive training sessions and
                assessments to
                reinforce security best practices. Gamified Cybersecurity Training engages employees with interactive
                security
                challenges, increasing retention. AI-Powered Threat Intelligence Solutions provide real-time updates on
                cybersecurity threats to keep employees informed. Cybersecurity Awareness Portals act as knowledge
                repositories
                for employees, offering policies, best practices, and guidelines. Additionally, Mobile Security Awareness
                Apps
                enable learning on the go, ensuring continuous education. By implementing these technologies, organizations
                can
                significantly reduce human-related security risks and improve overall cybersecurity posture.</p>
            <h3>2. Basic Concepts of Cybersecurity Awareness</h3>
            <p>Cybersecurity awareness is the foundation of an organization’s defense against cyber threats. It involves
                educating employees, stakeholders, and users about best security practices, potential cyber risks, and the
                importance of protecting sensitive information. Many cyberattacks, such as phishing, ransomware, and social
                engineering, exploit human errors, making awareness training essential for reducing security breaches. A
                well-informed workforce can act as the first line of defense against cyber threats.</p>
            <p>One key aspect of cybersecurity awareness is identifying common threats and attack vectors. Employees must be
                trained to recognize phishing emails, suspicious links, and unauthorized access attempts. Organizations
                should
                implement regular security training, simulated phishing exercises, and incident response drills to prepare
                their
                teams for real-world cyber threats. Additionally, enforcing strong password policies, multi-factor
                authentication (MFA), and secure browsing habits can significantly enhance an organization’s cybersecurity
                posture.</p>
            <p>Another important factor is building a cybersecurity culture within the organization. Cybersecurity should
                not be
                seen as just an IT responsibility but a shared responsibility across all departments. Encouraging open
                communication about security concerns, implementing cybersecurity policies, and rewarding secure behavior
                can
                help foster a proactive security mindset. Organizations should also stay updated with evolving cyber threats
                and
                provide continuous learning opportunities to employees. By prioritizing cybersecurity awareness, businesses
                can
                mitigate risks, protect sensitive data, and build a resilient security framework.</p>

            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Awareness</h3>
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
                        <td>Cybersecurity Training Completion Rate</td>
                        <td>Percentage of employees who have completed mandatory security training.</td>
                        <td>Quarterly (NCA-ECC-1-10-3)</td>
                    </tr>
                    <tr>
                        <td>Phishing Test Success Rate</td>
                        <td>Percentage of employees who correctly identify and report phishing emails.</td>
                        <td>Bi-Annually (NCA Awareness)</td>
                    </tr>
                    <tr>
                        <td>Security Policy Acknowledgment Rate</td>
                        <td>Percentage of employees who have read and acknowledged security policies.</td>
                        <td>Annually (NCA Compliance Mgmt)</td>
                    </tr>
                    <tr>
                        <td>Incident Reporting Awareness</td>
                        <td>Number of security incidents reported due to awareness training.</td>
                        <td>Monthly (NCA Incident Mgmt)</td>
                    </tr>
                    <tr>
                        <td>Social Engineering Resistance Score</td>
                        <td>Measures employee resilience against social engineering attacks.</td>
                        <td>Annually (NCA Social Engineering)</td>
                    </tr>
                </tbody>
            </table>
            <h3>4. Cybersecurity Awareness Products</h3>
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
                        <td>Learning Management Systems (LMS)</td>
                        <td>Provides structured cybersecurity training courses for employees.</td>
                        <td>NCA Cybersecurity Awareness</td>
                    </tr>
                    <tr>
                        <td>Phishing Simulation Platforms</td>
                        <td>Tests employees’ ability to detect and report phishing attacks.</td>
                        <td>NCA Email Security</td>
                    </tr>
                    <tr>
                        <td>Security Awareness Training Platforms</td>
                        <td>Offers interactive training modules on cybersecurity best practices.</td>
                        <td>NCA Cybersecurity Training</td>
                    </tr>
                    <tr>
                        <td>Gamified Cybersecurity Training</td>
                        <td>Uses interactive challenges and simulations to enhance security awareness.</td>
                        <td>NCA Employee Engagement</td>
                    </tr>
                    <tr>
                        <td>AI-Powered Threat Intelligence</td>
                        <td>Provides real-time updates on evolving cybersecurity threats.</td>
                        <td>NCA Cyber Threat Intelligence</td>
                    </tr>
                    <tr>
                        <td>Cybersecurity Awareness Portals</td>
                        <td>Hosts policies, best practices, and guidelines for employees.</td>
                        <td>NCA Policy Compliance</td>
                    </tr>
                    <tr>
                        <td>Mobile Security Awareness Apps</td>
                        <td>Delivers cybersecurity training and alerts via mobile devices.</td>
                        <td>NCA Mobile Security</td>
                    </tr>
                    <tr>
                        <td>Employee Security Quiz Tools</td>
                        <td>Assesses cybersecurity knowledge and provides feedback.</td>
                        <td>NCA Compliance</td>
                    </tr>
                    <tr>
                        <td>Secure Messaging Awareness Tools</td>
                        <td>Educates employees on secure communication practices.</td>
                        <td>NCA Secure Communication</td>
                    </tr>
                    <tr>
                        <td>Social Engineering Training Programs</td>
                        <td>Trains employees to recognize and counter social engineering attacks.</td>
                        <td>NCA Social Engineering Defense</td>
                    </tr>
                </tbody>
            </table>
            <h3>5. Summary</h3>
            <p>Cybersecurity awareness is a critical component of an organization's security strategy, ensuring that
                employees
                and stakeholders are equipped to recognize and mitigate cyber threats. Organizations must implement LMS
                platforms, phishing simulations, gamified training, and AI-powered threat intelligence tools to foster a
                culture
                of cybersecurity awareness. By tracking key performance indicators (KPIs), such as training completion rates
                and
                phishing test success rates, organizations can measure the effectiveness of their awareness programs.
                Compliance
                with NCA cybersecurity frameworks ensures that organizations maintain high-security standards. An informed
                workforce is the first line of defense against cyber threats, and continuous education, reinforcement, and
                engagement are essential for building a resilient cybersecurity posture.</p>
        </article>
    </div>
@endsection
