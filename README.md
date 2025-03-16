### html injection:
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


### Example of HTML Injection

```Vulnerable Code (PHP Example)

<?php
    $name = $_GET['name'];
    echo "<h1>Welcome, $name</h1>";
?>
```
---

### how to detect html injection vulnerability ?

- Find a input parameter either Get Based or Post Based
- If your input Reflect Back to you on web page there may be HTML injection
- Execute any HTML Code, if you successed to execute any HTML code there. then there is HTML injection

### To check input reflected or not

- find input and write: hello world if it reflect then use payload
- payload: '<h1>helloworld</h1>'

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

