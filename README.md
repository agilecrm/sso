Agile CRM : Setting up Single Sign-On with JWT (JSON Web Token)
=================

[Agile CRM] (https://www.agilecrm.com/) is a new breed CRM software with sales and marketing automation.

Table of contents
---------------

**[Introduction](#npm-agile-crm-installation)**

**[JWT implementation code examples](#requirements)**

**[The single sign-on authentication process](#apis-details)**

SSO Introduction : 
--------------------------

Single sign-on is a mechanism that allows you to authenticate users in your systems and subsequently tell Agile CRM that the user has been authenticated. 
The user is then allowed to access Agile CRM without being prompted to enter separate login credentials. 

At the core of single sign-on is a security mechanism that allows Agile CRM to trust the login requests it gets from your systems. Agile CRM only grants access to the users that have been authenticated by you. 
Agile CRM SSO relies on a technology called JSON Web Token (JWT) for securing the exchange of user authentication data.

JWT implementation code examples : 
--------------------------

The files in this repository are examples and not guaranteed to run or be correct. They should explain you how you can make Agile CRM SSO work with JWT from your stack.

The single sign-on authentication process : 
--------------------------

Once you enable single sign-on, login requests are routed to a remote login URL (a login page that is external to your Zendesk).

Here are the steps of the single sign-on authentication process:

An unauthenticated user (not already logged in) navigates to your Zendesk URL (for example, https:// mycompany .zendesk.com/).
The Zendesk SSO mechanism recognizes that SSO is enabled and that the user is not authenticated.
The user is redirected to the remote login URL configured for the SSO settings (for example, https:// mycompany .com/zendesk/sso).
A script on your side authenticates the user using your proprietary login process.
Your script builds a JWT request that contains the relevant user data.
You redirect the customer to the Zendesk endpoint at https:// mycompany .zendesk.com/access/jwt with the JWT payload.
Zendesk parses the user detail from the JWT payload and then grants the user a session.
As you can see, this process relies on browser redirects and passing signed messages using JWT. The redirects happen entirely in the browser and there is no direct connection between Zendesk and your systems, so you can keep your authentication scripts safely behind your corporate firewall.
