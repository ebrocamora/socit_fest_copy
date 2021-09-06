@extends('layouts.policy')

@section('title')
Privacy Policy
@endsection

@section('content')
    <!-- General -->
    <h2 class="font-bold text-2xl py-4 font-poppins">
        General
    </h2>
    <p class="mb-2">
        { name } (also collectively referred as "Organizations", "we", "our", and "us") established this Data Privacy Policy to show that we recognize and value your privacy rights.
    </p>

    <!-- Introduction -->
    <h2 class="font-bold text-2xl py-4 font-poppins">
        Introduction
    </h2>
    <p class="mb-2">
        The <a href="https://www.privacy.gov.ph/data-privacy-act/" target="_blank" class="hover:underline font-bold">Data Privacy Act (DPA) of 2012, or Republic Act 10173</a>, is an act that aims to protect an individual's personal information in information and communications systems of the government and private sector.
    </p>
    <p class="mb-2">
        “It is the policy of the State to protect the fundamental human right of privacy, of communication while ensuring free flow of information to promote innovation and growth. The State recognizes the vital role of information and communications technology in nation-building and its inherent obligation to ensure that personal information in information and communications systems in the government and in the private sector are secured and protected” <a href="https://www.privacy.gov.ph/data-privacy-act/#2" target="_blank" class="hover:underline font-bold">(DPA of 2012, Chapter I. Sec. 2. Declaration of Policy)</a>.
    </p>

    <!-- Personal Information -->
    <h2 class="font-bold text-2xl py-4 font-poppins">
        Personal Information
    </h2>
    <p class="mb-2">
        We collect the following personal information from you when you manually or electronically answer questions from our online application and feedback forms:
    </p>
    <ol class="list-decimal ml-4 pl-4">
        <li>
            <strong>Registration</strong>
            <ul class="list-disc ml-4 pl-4">
                <li>
                    Full Name (First, Middle, and Surname)
                </li>
                <li>
                    Student Email Addresses (APC and National University Students)
                </li>
                <li>
                    Password
                </li>
            </ul>
        </li>
    </ol>

    <!-- Use -->
    <h2 class="font-bold text-2xl py-4 font-poppins">
        Use
    </h2>
    <p class="mb-2">
        The personal information that you provide will solely be used for documentation purposes of the Organizations. It will not be disclosed to any third party. The information will be used by the Organizations to properly assist the students during the SOCIT Fest event.
    </p>

    <!-- Website Analytics -->
    <h2 class="font-bold text-2xl py-4 font-poppins">
        Website Analytics
    </h2>
    <p class="mb-2">
        The website's data usage is analyzed using Microsoft's Azure platform. No personal user information is shared to any third party including Azure's. Only non-identifiable web traffic data are analyzed, namely your IP address, the pages and internal links accessed on our site, the date and time you visited the site, geolocation, the referring site or platform (if any) through which you clicked through to this site, your operating system, and your web browser type.
    </p>
@endsection
