### HTML injection:
HTML injection is type of injection issue that occurs when a user is able to control an input point and is able to inject arbitrary HTML code into a vulnerable web page.

---

### Types of HTML Injection

  - Reflected HTML Injection – The injected HTML appears only in the current request.
  - Stored HTML Injection – The injected HTML is permanently stored on the website and affects multiple users.

---

### Impact of HTML Injection

  1. it can allow attacker to modify the page.
  2. DOM can be load there.
  3. attackers can perform XSS.
  4. steal user’s credential.
  5. attacker can perform open redirection.


### Example of HTML Injection

```Vulnerable Code (PHP Example)

<?php
    $name = $_GET['name'];
    echo "<h1>Welcome, $name</h1>";
?>
```
### Exploit

- Attacker inputs:
  ```
  <script>alert('Hacked!');</script>
  ```
- Output on the page:
  ```
  <h1>Welcome, <script>alert('Hacked!');</script></h1>
  ```
This executes JavaScript when the page loads, leading to potential XSS (Cross-Site Scripting).
---

### how to detect html injection vulnerability ?

- Find a input parameter either Get Based or Post Based
- If your input Reflect Back to you on web page there may be HTML injection
- Execute any HTML Code, if you successed to execute any HTML code there. then there is HTML injection

### To check input reflected or not

- find input and write: hello world if it reflect then use payload
- payload: ```<h1>helloworld</h1>```

---

## Lab Setup for HTML Injection
We'll create a **vulnerable web application** using **PHP and Apache** to test HTML Injection.

###  Steps to Set Up the Lab
### **1️) Install Required Tools**
You'll need:  
- A web server (**XAMPP** or **Apache with PHP**)  
- A browser (preferably **Burp Suite** for testing)  
- A text editor (VS Code, Sublime, or Nano)  

#### **For XAMPP (Recommended)**
Download and install **XAMPP** from [Apache Friends](https://www.apachefriends.org/index.html).  
Start **Apache** from the XAMPP Control Panel.

---

### **2️) Create a Vulnerable Web Application**
Navigate to your web root:  
- On **XAMPP (Windows)**: `C:\xampp\htdocs\`  
- On **Linux (Apache default)**: `/var/www/html/`

#### **Create a file named `vuln_html_injection.php`**
```php
<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];  // No sanitization -> Vulnerable to HTML Injection
    echo "<h1>Welcome, $name</h1>";
} else {
    echo "<h1>Enter your name in the URL.</h1>";
}
?>
```

---

### **3) Running the Lab**
1. **Start Apache** (`sudo systemctl start apache2` on Linux or XAMPP Control Panel on Windows).  
2. **Access the page in your browser:**  
   ```
   http://localhost/html_lab.php?name=Harsh
   ```
3. **Test for Injection**  
   Try injecting HTML:
   ```
   http://localhost/html_lab.php?name=<h1 style="color:red">Hacked!</h1>
   ```
   **Expected Output (Vulnerable Page):**  
   ```
   Hacked! (in large red text)
   ```

   Now try injecting JavaScript (which could lead to XSS):
   ```
   http://localhost/html_lab.php?name=<script>alert('Hacked!');</script>
   ```

---


### How to Prevent HTML Injection?

- Sanitize User Input: Use htmlspecialchars() in PHP.
  ```
  $name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
  echo "<h1>Welcome, $name</h1>";
  ```
- Use Content Security Policy (CSP) to restrict execution of inline scripts.
- Validate and Escape Input before rendering it on the page.
- Use Web Application Firewalls (WAF) to block suspicious input.

