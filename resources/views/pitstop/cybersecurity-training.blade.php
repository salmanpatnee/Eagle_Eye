@extends('layouts.process')
@section('title', 'Cyber Security Training')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cyber Security Training">
                To ensure that staff of the Member Organization are equipped with the skills and required knowledge to
                protect the Member Organization’s information assets and to fulfil their cyber security
                responsibilities.
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
            <h1>Cyber Security Training</h1>
        </header>
        <article>
            <h3>1. Description of Cybersecurity Training Technologies:</h3>
            <p>Cybersecurity training technologies are designed to educate employees, IT professionals, and executives on
                best
                security practices, threat mitigation, and compliance with frameworks like NCA Essential Cybersecurity
                Controls
                (ECC). These technologies include Learning Management Systems (LMS), which provide structured security
                training
                courses, and Cybersecurity Simulation Platforms, which create real-world attack scenarios to test employee
                responses. Phishing Awareness and Simulation Tools assess employees' ability to recognize and respond to
                phishing attacks, while AI-Powered Adaptive Training Platforms customize training based on individual
                learning
                progress. Virtual Cyber Ranges offer hands-on cybersecurity exercises for security professionals, allowing
                them
                to practice incident response and threat mitigation. Role-Based Security Training Systems ensure that
                employees
                receive training tailored to their job responsibilities, reinforcing policies such as NCA Cybersecurity
                Governance and Data Protection Controls. These technologies enhance cybersecurity knowledge across all
                levels of
                an organization, reducing security risks and improving overall resilience.</p>

            <h3>2. Basic Concepts of Cyber Security Training</h3>
            <p>Cyber security training is essential for equipping employees with the knowledge and skills needed to
                identify,
                prevent, and respond to cyber threats. As cyber-attacks become more sophisticated, organizations must ensure
                that their workforce understands fundamental security practices, including password management, phishing
                awareness, secure browsing, and data protection policies. Well-trained employees act as the first line of
                defense, reducing the risk of security breaches caused by human error.</p>
            <p>A comprehensive cyber security training program should cover various aspects of security awareness, such as
                social engineering attacks, malware threats, secure remote work practices, and compliance with industry
                regulations. Training sessions can be conducted through interactive workshops, e-learning modules,
                real-world
                simulations, and phishing awareness campaigns. Regular training updates ensure that employees stay informed
                about emerging cyber threats and evolving security best practices.</p>
            <p>Organizations must embed cybersecurity awareness into their corporate culture by encouraging proactive
                security
                behaviors and fostering a sense of shared responsibility. Cyber security training should not be a one-time
                event
                but an ongoing initiative to adapt to new risks. By investing in structured training programs, businesses
                can
                strengthen their overall security posture, reduce vulnerabilities, and enhance resilience against cyber
                threats.
            </p>

            <h3>3. Key Performance Indicators (KPIs) in Cybersecurity Training</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="KPI Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Frequency" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Training Completion Rate</x-table.td>
                        <x-table.td>Percentage of employees who completed assigned cybersecurity training.</x-table.td>
                        <x-table.td>Quarterly (NCA-ECC-1-10-3)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Phishing Simulation Success Rate</x-table.td>
                        <x-table.td>Percentage of employees who correctly identify and report phishing emails.</x-table.td>
                        <x-table.td>Bi-Annually (NCA Awareness)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cybersecurity Knowledge Retention</x-table.td>
                        <x-table.td>Measures how well employees retain knowledge through post-training
                            assessments.</x-table.td>
                        <x-table.td>Annually (NCA Training)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Readiness Score</x-table.td>
                        <x-table.td>Assesses the preparedness of employees in handling cybersecurity incidents.</x-table.td>
                        <x-table.td>Bi-Annually (NCA Incident Mgmt)</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Compliance with Security Policies</x-table.td>
                        <x-table.td>Percentage of employees adhering to cybersecurity policies after training.</x-table.td>
                        <x-table.td>Annually (NCA Compliance Mgmt)</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>4. Cybersecurity Training Products</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="Product Name" />
                    <x-table.th label="Description" />
                    <x-table.th label="Relevant Standard" />
                </x-table.thead>
                <x-table.tbody>
                    <tr>
                        <x-table.td>Learning Management Systems (LMS)</x-table.td>
                        <x-table.td>Provides structured cybersecurity training programs.</x-table.td>
                        <x-table.td>NCA Cybersecurity Awareness</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Cybersecurity Simulation Platforms</x-table.td>
                        <x-table.td>Simulates real-world security threats to train employees.</x-table.td>
                        <x-table.td>NCA Threat Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Phishing Awareness Tools</x-table.td>
                        <x-table.td>Conducts phishing attack simulations to test employee response.</x-table.td>
                        <x-table.td>NCA Email Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>AI-Powered Adaptive Training</x-table.td>
                        <x-table.td>Customizes training based on user performance and risk profile.</x-table.td>
                        <x-table.td>NCA Cybersecurity Training</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Virtual Cyber Ranges</x-table.td>
                        <x-table.td>Provides hands-on exercises for cybersecurity professionals.</x-table.td>
                        <x-table.td>NCA Incident Response</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Role-Based Security Training</x-table.td>
                        <x-table.td>Tailors security training to specific job roles and responsibilities.</x-table.td>
                        <x-table.td>NCA Cybersecurity Governance</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Secure Coding Training Tools</x-table.td>
                        <x-table.td>Educates developers on secure software development practices.</x-table.td>
                        <x-table.td>NCA Application Security</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Incident Response Training Platforms</x-table.td>
                        <x-table.td>Trains IT teams on handling security incidents effectively.</x-table.td>
                        <x-table.td>NCA Incident Management</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Security Awareness Gamification</x-table.td>
                        <x-table.td>Uses games and challenges to reinforce cybersecurity concepts.</x-table.td>
                        <x-table.td>NCA Employee Engagement</x-table.td>
                    </tr>
                    <tr>
                        <x-table.td>Social Engineering Defense Training</x-table.td>
                        <x-table.td>Educates employees on preventing social engineering attacks.</x-table.td>
                        <x-table.td>NCA Social Engineering Defense</x-table.td>
                    </tr>
                </x-table.tbody>
            </x-table.table>
            <h3>5. Summary</h3>
            <p>Cybersecurity training is a crucial component of an organization's defense strategy, ensuring that employees
                and
                IT teams have the knowledge and skills to prevent and respond to cyber threats. Organizations must adopt LMS
                platforms, phishing simulations, AI-driven training, and cyber range exercises to provide comprehensive and
                effective security training. By tracking KPIs such as training completion rates, phishing detection success,
                and
                policy compliance, organizations can measure the effectiveness of their cybersecurity training programs.
                Compliance with NCA cybersecurity frameworks ensures that employees receive the necessary education to
                maintain
                a secure working environment. A well-trained workforce acts as the first line of defense against cyber
                threats,
                enhancing security resilience and reducing risk exposure.</p>
        </article>
    </div>
@endsection
