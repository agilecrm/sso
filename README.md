##Setting up Single Sign-On with JWT (JSON Web Token)

[Agile CRM] (https://www.agilecrm.com/) is a new breed CRM software with sales and marketing automation.

###Table of contents

**[SSO Introduction](#sso-introduction-)**

**[JWT implementation code examples](#jwt-implementation-code-examples-)**

**[The single sign-on authentication process](#the-single-sign-on-authentication-process-)**

**[Configuring your JWT implementation](#configuring-your-jwt-implementation-)**

**[Error handling](#error-handling-)**

**[Enabling JWT Single Sign-On in your Agile CRM](#enabling-jwt-single-sign-on-in-your-agile-crm-)**

**[Error handling](#important-information-)**

###SSO Introduction : 

Single sign-on is a mechanism that allows you to authenticate users in your systems and subsequently tell Agile CRM that the user has been authenticated. 
The user is then allowed to access Agile CRM without being prompted to enter separate login credentials. 

At the core of single sign-on is a security mechanism that allows Agile CRM to trust the login requests it gets from your systems. Agile CRM only grants access to the users that have been authenticated by you. 
Agile CRM SSO relies on a technology called JSON Web Token (JWT) for securing the exchange of user authentication data.

###JWT implementation code examples : 

The files in this repository are examples and not guaranteed to run or be correct. They should explain you how you can make Agile CRM SSO work with JWT from your stack.

###The Single Sign-On authentication process : 

Once you enable single sign-on, login requests are routed to a remote login URL (a login page that is external to your Agile CRM).

Here are the steps of the single sign-on authentication process:

1. An unauthenticated user (not already logged in) navigates to your Agile CRM URL (for example, https:// mycompany.agilecrm.com/).

2. The Agile CRM SSO mechanism recognizes that SSO is enabled and that the user is not authenticated.

3. The user is redirected to the remote login URL configured for the SSO settings (for example, https:// mycompany.com/agilecrm/sso).

4. A script on your side authenticates the user using your proprietary login process.

5. Your script builds a JWT request that contains the relevant user data.

6. You redirect the customer to the Agile CRM endpoint at https:// mycompany.agilecrm.com/access/sso with the JWT payload.

7. Agile CRM parses the user detail from the JWT payload and then grants the user a session.

As you can see, this process relies on browser redirects and passing signed messages using JWT. The redirects happen entirely in the browser and there is no direct connection between Agile CRM and your systems, so you can keep your authentication scripts safely behind your corporate firewall.

###Configuring your JWT implementation : 

To perform SSO for a user, you need to send several required user attributes to Agile CRM as a base64-encoded hash (hash table, dictionary). Most importantly, Agile CRM requires an email address to uniquely identify the user. Beyond the required attributes, which are shown in the table below, you may optionally send additional user profile data. This data is synced between your user management system and your Agile CRM.

The JWT payload must be sent to your Agile CRM domain using the https protocol. Example: https://mycompany.agilecrm.com/sso/jwt?jwt={payload}

####Table 1. Supported attributes

|Attribute|Mandatory|Description|
|:----|:----------|:----------|
|email|YES|Email of the user being signed in, used to uniquely identify the user record in Agile CRM.|
|name|Yes|The name of this user. The user in Agile CRM will be created or updated in accordance with this. Name is case sensitive|

###Error handling : 

1. If Agile CRM encounters an error while processing a JWT login request, it will report a message that explains what the issue is at the page https://mycompany.agilecrm.com/login/normal. Either you can login from here or correct the payload and try again SSO.

#### Enabling JWT single sign-on in your Agile CRM : 

1. Click on Admin Settings Preferences tabs.
2. Click on Single Sign-On tab
3. Enter Remote Login URL, the url where Agile CRM SSO will redirect once SSO enable.
4. Submit form and hence SSO is enable.
5. You can desable SSO by deleting above configuration.


###Important Information : 

https://mycompany.agilecrm.com/login/normal is the alternative URL to login to Agile CRM in case SSO settings is not working from user end.
