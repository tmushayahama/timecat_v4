<?php

class LoginTest extends WebTestCase
{
	
	public function testLogin()
	{
		$this->open("");
		/*$this->assertTrue($this->isTextPresent("Log in:"));
		*/try {
        $this->assertTrue($this->isTextPresent("Rre:"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertTrue($this->isTextPresent("Remember Me"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertTrue($this->isTextPresent("exact:Don't have an account?"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertTrue($this->isTextPresent("exact:Forgot your password?"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->type("id=UserLogin_email", "test1@example.com");
    $this->type("id=UserLogin_password", "12345");
    $this->click("name=yt0");
  /*  $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isTextPresent("Log in:"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertTrue($this->isTextPresent("Remember Me"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
		  //login first
   /* $this->open('?r=site/contact');
    $this->type('name=UserLogin[email]', 'test1@gmail.com');
		$this->type('name=UserLogin[password]', '12345');
    $this->clickAndWait("//input[@value='Log In']");
 
    // finally open url
    //$this->open($url);

		//$this->assertTextPresent('Log In');
	}

/*	public function testContact()
	{
		$this->open('?r=site/contact');
		$this->assertTextPresent('Contact Us');
		$this->assertElementPresent('name=ContactForm[name]');

		$this->type('name=ContactForm[name]','tester');
		$this->type('name=ContactForm[email]','tester@example.com');
		$this->type('name=ContactForm[subject]','test subject');
		$this->click("//input[@value='Submit']");
		$this->waitForTextPresent('Body cannot be blank.');
	}

	public function testLoginLogout()
	{
		$this->open('');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (demo)');

		// test login process, including validation
		$this->clickAndWait('link=Login');
		$this->assertElementPresent('name=LoginForm[username]');
		$this->type('name=LoginForm[username]','demo');
		$this->click("//input[@value='Login']");
		$this->waitForTextPresent('Password cannot be blank.');
		$this->type('name=LoginForm[password]','demo');
		$this->clickAndWait("//input[@value='Login']");
		$this->assertTextNotPresent('Password cannot be blank.');
		$this->assertTextPresent('Logout');

		// test logout process
		$this->assertTextNotPresent('Login');
		$this->clickAndWait('link=Logout (demo)');
		$this->assertTextPresent('Login*/
	}
}
