@extends('6-HotTopics/topic-layout')
@section('heading')
    26 Essential Items Checklist of Awareness Topics
@endsection
@section('background')
    <h3>Introduction</h3>
    <p>Cybersecurity awareness is a crucial element in an organization’s defense strategy against cyber threats. Human error
        remains one of the leading causes of security breaches, making it essential to educate employees on secure practices
        for handling emails, devices, networks, data, and social media. A well-structured cybersecurity awareness program
        ensures that employees understand potential risks, recognize security threats, and apply best practices to protect
        sensitive information and organizational systems.</p>
    <p>As organizations increasingly adopt remote work (telework), cloud computing, and social media engagement, they face
        new challenges related to data security, identity protection, and safe digital practices. Cybercriminals exploit
        vulnerabilities through phishing attacks, identity theft, social engineering, and insecure network configurations,
        making it imperative for employees to follow security guidelines and report suspicious activities to the
        cybersecurity team.</p>
    <p>This checklist provides a comprehensive overview of essential cybersecurity awareness topics, covering email
        security, device protection, telework security, data handling, and social media risks. By integrating these topics
        into an ongoing security awareness training program, organizations can minimize security incidents, enhance
        regulatory compliance, and build a culture of cybersecurity resilience.</p>
@endsection
@section('content')
    <h3>Essential Items Checklist of Awareness Topics in Cybersecurity</h3>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Awareness Topic</th>
                <th>Description</th>
                <th>Key Security Considerations</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Secure handling of email services, especially phishing emails</td>
                <td>Employees should be trained to identify phishing attempts, avoid clicking on malicious links, and report
                    suspicious emails.</td>
                <td>Recognizing phishing red flags, verifying email senders, avoiding unexpected attachments.</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Secure handling of mobile devices and storage media</td>
                <td>Mobile devices and external storage (USBs, hard drives) must be encrypted and physically secured.</td>
                <td>Using encrypted storage, avoiding public charging stations, implementing remote wipe capabilities.</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Secure Internet browsing</td>
                <td>Users should be cautious while browsing, ensuring they access only secure and trusted websites.</td>
                <td>Avoiding untrusted websites, using browser security settings, verifying SSL certificates.</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Secure use of social media</td>
                <td>Employees must avoid sharing sensitive information on social platforms and configure accounts securely.
                </td>
                <td>Setting strict privacy controls, preventing oversharing corporate details, avoiding third-party app
                    risks.</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Secure use of telework devices and how to protect them</td>
                <td>Employees should follow remote work security guidelines to protect company devices from threats.</td>
                <td>Using corporate VPNs, enabling firewalls and antivirus, keeping software updated.</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Secure handling of identities and passwords</td>
                <td>Strong passwords and multi-factor authentication (MFA) should be enforced.</td>
                <td>Using password managers, enabling MFA, avoiding password reuse.</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Protection of stored data on telework devices, handled based on its classification</td>
                <td>Data stored on remote work devices should be classified and encrypted to prevent unauthorized access.
                </td>
                <td>Encrypting sensitive data, enforcing data access restrictions, using secure cloud storage.</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Secure handling of applications and solutions used for telework (virtual conferencing, collaboration,
                    file sharing)</td>
                <td>Employees must use only approved collaboration tools and follow security protocols.</td>
                <td>Enforcing meeting passcodes, restricting file sharing, disabling auto-recording.</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Secure handling of home networks, ensuring secure configurations</td>
                <td>Employees should secure their home networks to prevent cyber intrusions.</td>
                <td>Changing default router credentials, enabling WPA3 encryption, disabling remote admin access.</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Avoiding telework using unreliable public devices or networks or while in public places</td>
                <td>Employees should not access corporate systems from untrusted devices or public Wi-Fi.</td>
                <td>Using corporate-approved devices, connecting via secure VPNs, avoiding auto-login.</td>
            </tr>
            <tr>
                <td>11</td>
                <td>Secure handling of official documents and information in telework settings</td>
                <td>Ensuring sensitive company documents are securely stored and not left unattended.</td>
                <td>Locking confidential files, using document management policies, shredding unnecessary printouts.</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Secure handling of printouts and disposal of classified documents</td>
                <td>Classified documents should be disposed of securely to prevent information leaks.</td>
                <td>Shredding sensitive papers, using secured bins, and digitalizing records instead of printing.</td>
            </tr>
            <tr>
                <td>13</td>
                <td>Handling insider threats and social engineering tactics</td>
                <td>Employees should be aware of potential insider threats and common social engineering tricks.</td>
                <td>Providing security training, monitoring employee access, and reporting suspicious behavior.</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Ensuring compliance with data protection regulations</td>
                <td>Organizations must comply with data protection laws such as GDPR, HIPAA, etc.</td>
                <td>Regular audits, employee training, and using compliant tools for data handling.</td>
            </tr>
            <tr>
                <td>15</td>
                <td>Regular software updates and patch management</td>
                <td>Keeping all software and systems updated to prevent vulnerabilities.</td>
                <td>Enforcing automatic updates, patching security flaws, and monitoring software versions.</td>
            </tr>
            <tr>
                <td>16</td>
                <td>Implementing least privilege access principles</td>
                <td>Employees should only have access to the data and systems necessary for their role.</td>
                <td>Role-based access control, periodic access reviews, and disabling inactive accounts.</td>
            </tr>
            <tr>
                <td>17</td>
                <td>Regular security awareness training</td>
                <td>Continuous education on cybersecurity threats and best practices.</td>
                <td>Conducting phishing simulations, security workshops, and mandatory compliance training.</td>
            </tr>
            <tr>
                <td>18</td>
                <td>Using endpoint protection solutions</td>
                <td>Devices must be secured with antivirus, firewalls, and endpoint security software.</td>
                <td>Deploying EDR solutions, enabling network segmentation, and regular scanning.</td>
            </tr>
            <tr>
                <td>19</td>
                <td>Enforcing secure authentication and authorization</td>
                <td>Ensuring secure login methods such as MFA and single sign-on (SSO).</td>
                <td>Implementing MFA, enforcing password policies, and using biometric authentication.</td>
            </tr>
            <tr>
                <td>20</td>
                <td>Implementing secure backup and disaster recovery plans</td>
                <td>Ensuring critical data is regularly backed up and recoverable in case of incidents.</td>
                <td>Using offsite backups, testing recovery procedures, and following 3-2-1 backup rule.</td>
            </tr>
            <tr>
                <td>21</td>
                <td>Ensuring secure remote access to corporate systems</td>
                <td>Implementing secure remote access solutions to prevent unauthorized entry.</td>
                <td>Using VPNs, restricting IP access, and enabling logging and monitoring.</td>
            </tr>
            <tr>
                <td>22</td>
                <td>Implementing network security measures</td>
                <td>Ensuring company networks are protected against threats.</td>
                <td>Using firewalls, intrusion detection systems, and segmented networks.</td>
            </tr>
            <tr>
                <td>23</td>
                <td>Detecting and responding to cybersecurity incidents</td>
                <td>Developing a clear incident response plan for handling security breaches.</td>
                <td>Establishing an incident response team, monitoring logs, and regular security drills.</td>
            </tr>
            <tr>
                <td>24</td>
                <td>Implementing physical security controls</td>
                <td>Securing office spaces and data centers from unauthorized access.</td>
                <td>Using surveillance cameras, access badges, and biometric authentication.</td>
            </tr>
            <tr>
                <td>25</td>
                <td>Conducting penetration testing and security audits</td>
                <td>Regular security assessments to find and fix vulnerabilities.</td>
                <td>Hiring ethical hackers, conducting internal audits, and using automated scanning tools.</td>
            </tr>
            <tr>
                <td>26</td>
                <td>Developing a cybersecurity culture</td>
                <td>Fostering an organization-wide culture of cybersecurity awareness.</td>
                <td>Encouraging secure practices, rewarding compliance, and creating an open security dialogue.</td>
            </tr>
        </tbody>
    </table>
    <h3>Take Away</h3>
    <p>A strong cybersecurity awareness program is vital to ensuring that employees and stakeholders understand security
        risks and take appropriate precautions to mitigate cyber threats. Organizations must establish clear security
        policies, conduct regular training sessions, and encourage a culture of cybersecurity accountability.</p>
    <p>By implementing the Essential Awareness Checklist, organizations can significantly reduce risks associated with
        telework, social media, data security, and unauthorized access. Regular cybersecurity awareness initiatives will
        empower employees, strengthen defenses, and enhance overall security posture against evolving cyber threats.</p>
@endsection
