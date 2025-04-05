![Descripción de la imagen](https://media.licdn.com/dms/image/v2/D4D03AQH6EQ2P9c-O7g/profile-displayphoto-shrink_200_200/B4DZXdqn_oHsAY-/0/1743180693856?e=1749081600&v=beta&t=NAQj2UwNSWjKWis32wndJATMuej_X6LZWlqoEbQib3E)
# MV_THM_Vuls 

This project for become aware about to phishing  


# 🕵️‍♂️ Operation Pegasus: Compromise of The Server Sharkers' Network

## 🎭 Preface: The Chaos Squad

We are a... peculiar trio:

- **Martín "Moe"** – The (disastrous) "leader". A dev who means well but fixes bugs by creating three more. Thinks he’s in control.
- **Santiago "Larry"** – The mediator who breaks things. A QA who swears everything works... until he touches it and it all crashes.
- **Freddy "Curly"** – The mad inventor. A “hardware hacker” who experiments without knowing what he's doing. Sometimes hacks, sometimes sets things on fire.

## 💡 Project Description

> _"Walk among the clouds... literally."_  
> — Slogan for the Cloud Walkers (CW)

### 🛰️ Project Name:
**Operation Pegasus**

### 🏢 Target Organization:
**The Server Sharkers**  
A cutting-edge tech company developing **flying shoes** known as *Cloud Walkers*.

---

## 🎯 Attack Objective

Gain unauthorized access to **secret blueprints** stored in the R&D department, protected by a combination of IDS/IPS, cameras, and restricted access zones.

---

## 🔍 Simulated Scenario

1. **Manolo**, a key employee and horse racing addict, uses his corporate computer to access betting websites.
2. A **passive investigation** is performed on Manolo: habits, online activity, interests.
3. A **phishing attack** is launched, redirecting him to a fake betting site.
4. Once accessed, a **trojan** is downloaded, granting remote access to his machine.
5. From there, the attacker **pivots** to an **open IP** linked to a surveillance camera.
6. The camera points to the reception desk, where **Lucy**, the secretary, has a **sticky note** with the admin password on her laptop.
7. The password is used to escalate privileges and access the internal network.
8. Eventually, a suspicious folder labeled **“Not here”** is found — but it contains the flying shoe blueprints.

---

## 🔓 Exploited Vulnerabilities

- Social engineering (custom phishing).
- Malware (remote access trojan).
- Poor physical security (visible password).
- Insecure IoT camera access.
- Weak network segmentation.

---

## 🧠 Lessons Learned

- Users are always the weakest link.
- Curiosity (or gambling addiction) can compromise even the most secure systems.
- **Never stick your password on your laptop. NEVER.**

---

## 🤖 Technical Stack

- Metasploit (phishing, trojan, pivoting).
- Nmap (reconnaissance).
- smbclient / enum4linux (enumeration).
- Wireshark / tcpdump (traffic analysis).
- OSINT and social engineering tools.

---

## 🪪 Credits

Project developed by:

- **Moe (Martín)** – “The dev with motivation but no QA”
- **Larry (Santiago)** – “The tester who breaks everything he touches”
- **Curly (Freddy)** – “The hacker with a screwdriver and a dream”

---

## 🧪 Disclaimer

> This project was created for **educational and awareness** purposes only.  
> No flying shoes were harmed during testing.

---

## 🧭 2. Maze Blueprint (Challenge Design)

### 📋 Executive Summary

**Project Objective:**  
Demonstrate how a combination of **social engineering** and **vulnerability exploitation** can lead to the full compromise of a corporate network containing sensitive information.

**Methodology:**  
This simulation will employ a blend of techniques including **OSINT (passive reconnaissance), phishing, malware deployment, privilege escalation,** and **lateral movement** within the network.

**Impact of the Attack:**  
Total compromise of the company's internal security, unauthorized access to confidential data, and potential **data exfiltration**.

**Conclusion:**  
The simulation will highlight:
- The critical role of the **human factor** in cybersecurity.  
- The importance of **cybersecurity awareness** among employees.  
- The need for **stronger technical controls** in enterprise environments.

---

### 🏁 Scenarios and Flags

Each stage of the attack contains **checkpoints (flags)** that participants must discover to track progress:

1. **Access to Manolo’s machine**  
   ➤ `flag1.txt` located on his desktop.

2. **Pivoting to the security camera feed**  
   ➤ An **image revealing a password** used as a flag.

3. **Access to Lucy’s laptop**  
   ➤ `flag2.txt` in Lucy’s user directory.

4. **Final access to the secret blueprints**  
   ➤ `flag3.txt` found in `/var/secret/no_es_aqui/`.

---

## 🎮 3. Attack Simulation on TryHackMe

To enhance immersion, this simulation is designed to run on **TryHackMe**, using interactive Markdown-based guides for attackers. The experience follows a narrative format:

### 🏢 Introduction
- Background story of **The Server Sharkers** tech company.
- Introduction to **Manolo**, an employee addicted to online horse betting.
  
### 🕵️‍♂️ Phase 1: OSINT
- Perform passive reconnaissance on Manolo (social media, habits, interests).
- Identify attack vectors based on collected data.

### 🎯 Phase 2: Phishing
- Launch a phishing campaign using **GoPhish**.
- Redirect Manolo to a fake betting site.
- Inject a **trojan** to gain remote access to his machine.

### 📷 Phase 3: Camera Exploitation
- Identify and pivot to an open IP tied to a surveillance camera.
- Capture a snapshot showing **Lucy’s laptop** and a password note.

### 🖥️ Phase 4: Gaining Lucy’s Credentials
- Use the password from the camera image to access Lucy's system.
- Pivot further into the internal network.

### 🧠 Final Phase: Privilege Escalation & Data Extraction
- Exploit privilege escalation vulnerabilities.
- Access the restricted folder: `/var/secret/no_es_aqui/`.
- Retrieve the final flag containing the **flying shoe blueprints**.


