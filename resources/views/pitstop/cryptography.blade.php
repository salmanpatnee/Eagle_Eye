@extends('layouts.process')
@section('title', 'Cryptography')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Cryptography">
                To ensure that access to and integrity of sensitive information is protected and the originator of
                communication or transactions can be confirmed.
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
            <h1>Cryptography</h1>
        </header>
        <article>
            <h3>1. Description of the Cryptography Technologies:</h3>
            <p>Cryptography is the foundation of secure communication in the digital world. It involves the use of
                mathematical
                techniques to protect data from unauthorized access, ensuring confidentiality, integrity, authentication,
                and
                non-repudiation. Cryptographic methods include symmetric encryption, asymmetric encryption, hashing, and
                digital
                signatures. Organizations use cryptographic algorithms such as AES (Advanced Encryption Standard), RSA
                (Rivest-Shamir-Adleman), and SHA (Secure Hash Algorithm) to secure sensitive information, including user
                credentials, financial transactions, and confidential communications. Implementing strong cryptographic
                controls
                is essential for regulatory compliance, data protection, and securing both on-premises and cloud
                environments.
                As cyber threats evolve, cryptographic standards continue to improve, ensuring resilience against attacks
                such
                as brute force, quantum computing, and cryptanalysis.</p>

            <h3>2. Basic Concepts of Cryptography</h3>
            <p>Cryptography is the practice of securing communication and information from unauthorized access by converting
                it
                into an unreadable format. It ensures data confidentiality, integrity, and authenticity by using
                mathematical
                algorithms and cryptographic keys. Modern cryptographic techniques protect sensitive information such as
                financial transactions, passwords, and confidential business communications. Cryptography is widely used in
                applications like secure web browsing (HTTPS), email encryption, and blockchain technology to prevent cyber
                threats like data breaches and eavesdropping.</p>
            <p>There are two main types of cryptography: symmetric encryption and asymmetric encryption. Symmetric
                encryption
                uses the same key for both encryption and decryption, making it fast and efficient. However, securely
                sharing
                the key can be challenging. Examples of symmetric encryption algorithms include AES (Advanced Encryption
                Standard) and DES (Data Encryption Standard). On the other hand, asymmetric encryption uses a pair of keys—a
                public key for encryption and a private key for decryption—enhancing security but requiring more
                computational
                power. Common asymmetric encryption algorithms include RSA (Rivest-Shamir-Adleman) and ECC (Elliptic Curve
                Cryptography).</p>
            <p>In addition to encryption, cryptography also ensures data integrity and authentication using cryptographic
                hash
                functions and digital signatures. Hash functions, such as SHA-256, create a unique fixed-length output for
                any
                given input, ensuring data has not been altered. Digital signatures provide authentication and
                non-repudiation,
                verifying the sender's identity and ensuring that messages are not tampered with. By implementing
                cryptographic
                techniques, organizations can safeguard sensitive data, prevent cyber threats, and comply with security
                regulations like GDPR and PCI DSS.</p>
            <h3>3. Key Performance Indicators (KPIs) in Cryptography</h3>
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
                        <td>Encryption Strength</td>
                        <td>Measures the robustness of encryption algorithms used in securing data.</td>
                        <td>Quarterly</td>
                    </tr>
                    <tr>
                        <td>Key Rotation Compliance</td>
                        <td>Tracks adherence to scheduled cryptographic key rotations.</td>
                        <td>Monthly</td>
                    </tr>
                    <tr>
                        <td>Hashing Integrity Checks</td>
                        <td>Monitors data integrity by validating cryptographic hash values.</td>
                        <td>Weekly</td>
                    </tr>
                    <tr>
                        <td>Certificate Expiry Monitoring</td>
                        <td>Ensures that SSL/TLS certificates are renewed before expiration.</td>
                        <td>Monthly</td>
                    </tr>
                    <tr>
                        <td>Quantum-Safe Readiness</td>
                        <td>Evaluates cryptographic resilience against emerging quantum threats.</td>
                        <td>Annually</td>
                    </tr>
                </tbody>
            </table>
            <h3>4. Cryptography Products</h3>
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
                        <td>AES Encryption</td>
                        <td>Advanced Encryption Standard (AES) ensures high-level data encryption.</td>
                        <td>NCA Data Cybersecurity Controls</td>
                    </tr>
                    <tr>
                        <td>RSA Cryptosystem</td>
                        <td>Public-key encryption method for secure data exchange.</td>
                        <td>NCA Identity & Access Management</td>
                    </tr>
                    <tr>
                        <td>SHA-256 Hashing</td>
                        <td>Secure hash function for data integrity verification.</td>
                        <td>NCA Cybersecurity Defense</td>
                    </tr>
                    <tr>
                        <td>PKI (Public Key Infrastructure)</td>
                        <td>Manages digital certificates and encryption keys.</td>
                        <td>NCA Secure Communications</td>
                    </tr>
                    <tr>
                        <td>HSM (Hardware Security Module)</td>
                        <td>Dedicated hardware for secure key management.</td>
                        <td>NCA Critical Cybersecurity Controls</td>
                    </tr>
                    <tr>
                        <td>Quantum Cryptography</td>
                        <td>Next-gen encryption resistant to quantum computing threats.</td>
                        <td>NCA Emerging Technologies Security</td>
                    </tr>
                    <tr>
                        <td>Digital Signatures</td>
                        <td>Ensures authentication and non-repudiation of electronic documents.</td>
                        <td>NCA Secure Transactions</td>
                    </tr>
                    <tr>
                        <td>SSL/TLS Encryption</td>
                        <td>Secures web communications using strong cryptographic protocols.</td>
                        <td>NCA Network Security</td>
                    </tr>
                    <tr>
                        <td>Zero Trust Encryption</td>
                        <td>Applies continuous encryption for Zero Trust security frameworks.</td>
                        <td>NCA Zero Trust Architecture</td>
                    </tr>
                    <tr>
                        <td>End-to-End Encryption (E2EE)</td>
                        <td>Protects data from sender to recipient without third-party access.</td>
                        <td>NCA Secure Messaging</td>
                    </tr>
                </tbody>
            </table>
            <h3>5. Summary</h3>
            <p>Cryptography plays a critical role in securing digital communications, ensuring data confidentiality, and
                safeguarding sensitive information from cyber threats. As technology evolves, organizations must adopt
                advanced
                cryptographic techniques to stay ahead of emerging risks, including quantum computing threats. A
                well-implemented cryptographic framework enhances security, strengthens regulatory compliance, and provides
                a
                robust defense against cyberattacks. By leveraging strong encryption, secure key management, and digital
                signature technologies, businesses can protect their assets and maintain trust in an increasingly
                interconnected
                digital world.</p>
        </article>
    </div>
@endsection
