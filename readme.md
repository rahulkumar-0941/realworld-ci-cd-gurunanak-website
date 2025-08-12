# 📦 realworld-ci-cd-gurunanak-website

This is a **real-world CI/CD pipeline project** for deploying the static website of **Shri Gurunanak Transport Company**.  
It shows how to combine **Git, GitHub, Terraform, Ansible, Jenkins, Apache, Let’s Encrypt**, and a custom domain to fully automate deployment with HTTPS.

---

## ✨ Summary

- **Domain:** [https://gurunanaktransport.online](https://gurunanaktransport.online)  
- **Hosted on:** AWS EC2 (Amazon Linux)
- **Pipeline:** GitHub → Jenkins → EC2 → Apache
- **Security:** HTTPS enabled with Let’s Encrypt
- **Automation:** Provisioning, configuration, deployment — fully automated with Terraform, Ansible, and Jenkins

---

## ⚙️ Tech Stack & Tools

- **Git & GitHub** — Version control & remote repository
- **Terraform** — Infrastructure as Code for EC2 provisioning
- **Ansible** — Server configuration (Git, Jenkins, Apache)
- **Jenkins** — CI/CD server:
  - Freestyle project
  - GitHub webhook triggers build
  - Uses **Publish Over SSH** to copy files to EC2
- **Apache HTTP Server** — Serves static website files
- **Certbot + Let’s Encrypt** — Free SSL for HTTPS
- **Hostinger** — Domain name registrar & DNS manager

---

## 🚀 How It Works

1️⃣ **Source Code**  
   - Website code is stored in a GitHub repository.

2️⃣ **Provision Server**  
   - Terraform launches an EC2 instance on AWS.

3️⃣ **Configure Server**  
   - Ansible installs Git, Jenkins, Apache (`httpd`) and configures virtual hosts.

4️⃣ **Automated Deployment**  
   - GitHub webhook triggers Jenkins on every push.
   - Jenkins pulls the updated code and deploys it to EC2 using **Publish Over SSH**.

5️⃣ **Web Hosting**  
   - Apache serves the static site over ports **80** and **443**.

6️⃣ **SSL/HTTPS**  
   - Certbot obtains and configures a Let’s Encrypt SSL certificate.
   - Apache is secured with HTTPS.

7️⃣ **Domain Mapping**  
   - DNS records on Hostinger point to the EC2’s public IP.

---

## 📂 Project Structure

```plaintext
realworld-ci-cd-gurunanak-website/
.

 ├── code/
 │   ├── index.html
 │   ├── aboutus.html
 │   └── contact.html
 │   ├── postload.html
 │   └── services.html
 │   ├── css/
 │   ├── javascript/  # EmailJS integration for sending form data to your email
 │   └── images/
 ├── terraform/      # Terraform configs for EC2
 ├── ansible/        # Ansible playbooks for server setup
 ├── jenkins/        # Jenkins job configs
 ├── README.md

✅ Step-by-Step Deployment
bash
Copy
Edit
# 1️⃣ Clone the repository
git clone https://github.com/yourusername/realworld-ci-cd-gurunanak-website.git
cd realworld-ci-cd-gurunanak-website

# 2️⃣ Provision EC2 with Terraform
cd terraform
terraform init
terraform plan
terraform apply

# 3️⃣ Configure EC2 with Ansible
cd ../ansible
ansible-playbook -i inventory setup.yml

# 4️⃣ Set up Jenkins manually:
# - Create Freestyle Project
# - Add GitHub repo URL
# - Configure GitHub webhook to auto-trigger build
# - Use Publish Over SSH to deploy files to EC2

# 5️⃣ Enable HTTPS with Certbot
sudo certbot --apache -d gurunanaktransport.online

# 6️⃣ Restart Apache
sudo systemctl restart httpd

# ✔️ Site is live: https://gurunanaktransport.online
📝 Notes
✅ Make sure Security Groups allow SSH (22), HTTP (80), and HTTPS (443).

✅ Check NACLs for inbound/outbound rules (ALLOW ALL for test env).

✅ Use sudo firewall-cmd --list-all to ensure https service is open.

✅ Certbot auto-renews the SSL certificate.

✅ Use systemctl status httpd to check Apache status.


👋 Author
Rahul Kumar 
AWS DevOps Engineer
