<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ThreadForge API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-register">
                                <a href="#authentication-POSTapi-register">Register.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                                <a href="#authentication-POSTapi-login">Login.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-logout">
                                <a href="#authentication-POSTapi-logout">Logout.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETapi-me">
                                <a href="#authentication-GETapi-me">Current user.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-campaign-blueprints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="campaign-blueprints">
                    <a href="#campaign-blueprints">Campaign Blueprints</a>
                </li>
                                    <ul id="tocify-subheader-campaign-blueprints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="campaign-blueprints-GETapi-campaign-blueprints">
                                <a href="#campaign-blueprints-GETapi-campaign-blueprints">List campaign blueprints.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaign-blueprints-POSTapi-campaign-blueprints">
                                <a href="#campaign-blueprints-POSTapi-campaign-blueprints">Create a campaign blueprint.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaign-blueprints-GETapi-campaign-blueprints--id-">
                                <a href="#campaign-blueprints-GETapi-campaign-blueprints--id-">Show a campaign blueprint.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaign-blueprints-PUTapi-campaign-blueprints--id-">
                                <a href="#campaign-blueprints-PUTapi-campaign-blueprints--id-">Update a campaign blueprint.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campaign-blueprints-DELETEapi-campaign-blueprints--id-">
                                <a href="#campaign-blueprints-DELETEapi-campaign-blueprints--id-">Delete a campaign blueprint.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-content-generation" class="tocify-header">
                <li class="tocify-item level-1" data-unique="content-generation">
                    <a href="#content-generation">Content Generation</a>
                </li>
                                    <ul id="tocify-subheader-content-generation" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="content-generation-POSTapi-content-repurpose">
                                <a href="#content-generation-POSTapi-content-repurpose">Submit raw content for repurposing.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="content-generation-GETapi-raw-contents">
                                <a href="#content-generation-GETapi-raw-contents">List raw content submissions.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="content-generation-GETapi-raw-contents--rawContent_id-">
                                <a href="#content-generation-GETapi-raw-contents--rawContent_id-">Show a raw content submission.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-generated-posts" class="tocify-header">
                <li class="tocify-item level-1" data-unique="generated-posts">
                    <a href="#generated-posts">Generated Posts</a>
                </li>
                                    <ul id="tocify-subheader-generated-posts" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="generated-posts-GETapi-generated-posts">
                                <a href="#generated-posts-GETapi-generated-posts">List generated posts.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="generated-posts-GETapi-generated-posts--generatedPost_id-">
                                <a href="#generated-posts-GETapi-generated-posts--generatedPost_id-">Show a generated post.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="generated-posts-PATCHapi-generated-posts--generatedPost_id--status">
                                <a href="#generated-posts-PATCHapi-generated-posts--generatedPost_id--status">Update generated post status.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-ghostwriter-assistant" class="tocify-header">
                <li class="tocify-item level-1" data-unique="ghostwriter-assistant">
                    <a href="#ghostwriter-assistant">Ghostwriter Assistant</a>
                </li>
                                    <ul id="tocify-subheader-ghostwriter-assistant" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="ghostwriter-assistant-POSTapi-generated-posts--generatedPost_id--chat">
                                <a href="#ghostwriter-assistant-POSTapi-generated-posts--generatedPost_id--chat">Chat with a generated post.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 6, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Headless API for campaign blueprints, queued AI post generation, and a contextual ghostwriter assistant.</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {BEARER_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Use the token returned by the register or login endpoint as a Bearer token.</p>

        <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTapi-register">Register.</h2>

<p>
</p>

<p>Creates a creator account and returns a Sanctum Bearer token.</p>

<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Thread Forge\",
    \"email\": \"creator@example.com\",
    \"password\": \"password123\",
    \"password_confirmation\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Thread Forge",
    "email": "creator@example.com",
    "password": "password123",
    "password_confirmation": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="Thread Forge"
               data-component="body">
    <br>
<p>Creator display name. Example: <code>Thread Forge</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="creator@example.com"
               data-component="body">
    <br>
<p>Unique email address. Example: <code>creator@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="password123"
               data-component="body">
    <br>
<p>Minimum 8 characters and confirmed. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-register"
               value="password123"
               data-component="body">
    <br>
<p>Must match password. Example: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-login">Login.</h2>

<p>
</p>

<p>Authenticates a creator and returns a Sanctum Bearer token.</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"creator@example.com\",
    \"password\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "creator@example.com",
    "password": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="creator@example.com"
               data-component="body">
    <br>
<p>Account email. Example: <code>creator@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="password123"
               data-component="body">
    <br>
<p>Account password. Example: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-logout">Logout.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Revokes the current access token.</p>

<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/logout" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logout"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
</span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-GETapi-me">Current user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the authenticated creator profile.</p>

<span id="example-requests-GETapi-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/me" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/me"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-me" data-method="GET"
      data-path="api/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-me"
                    onclick="tryItOut('GETapi-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-me"
                    onclick="cancelTryOut('GETapi-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-me"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="campaign-blueprints">Campaign Blueprints</h1>

    

                                <h2 id="campaign-blueprints-GETapi-campaign-blueprints">List campaign blueprints.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the authenticated creator's style blueprints with raw-content and generated-post counts.</p>

<span id="example-requests-GETapi-campaign-blueprints">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/campaign-blueprints" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/campaign-blueprints"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-campaign-blueprints">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campaign-blueprints" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campaign-blueprints"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campaign-blueprints"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campaign-blueprints" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campaign-blueprints">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campaign-blueprints" data-method="GET"
      data-path="api/campaign-blueprints"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campaign-blueprints', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campaign-blueprints"
                    onclick="tryItOut('GETapi-campaign-blueprints');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campaign-blueprints"
                    onclick="cancelTryOut('GETapi-campaign-blueprints');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campaign-blueprints"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campaign-blueprints</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-campaign-blueprints"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campaign-blueprints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campaign-blueprints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="campaign-blueprints-POSTapi-campaign-blueprints">Create a campaign blueprint.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Stores strict writing rules used later by the AI generation job.</p>

<span id="example-requests-POSTapi-campaign-blueprints">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/campaign-blueprints" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Tech community daily posts\",
    \"tone\": \"Professional but relaxed\",
    \"max_hashtags\": 1,
    \"max_characters\": 280,
    \"additional_rules\": \"Avoid buzzwords and end with a concrete lesson.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/campaign-blueprints"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Tech community daily posts",
    "tone": "Professional but relaxed",
    "max_hashtags": 1,
    "max_characters": 280,
    "additional_rules": "Avoid buzzwords and end with a concrete lesson."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-campaign-blueprints">
</span>
<span id="execution-results-POSTapi-campaign-blueprints" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-campaign-blueprints"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-campaign-blueprints"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-campaign-blueprints" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-campaign-blueprints">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-campaign-blueprints" data-method="POST"
      data-path="api/campaign-blueprints"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-campaign-blueprints', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-campaign-blueprints"
                    onclick="tryItOut('POSTapi-campaign-blueprints');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-campaign-blueprints"
                    onclick="cancelTryOut('POSTapi-campaign-blueprints');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-campaign-blueprints"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/campaign-blueprints</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-campaign-blueprints"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-campaign-blueprints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-campaign-blueprints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-campaign-blueprints"
               value="Tech community daily posts"
               data-component="body">
    <br>
<p>Blueprint name. Example: <code>Tech community daily posts</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tone"                data-endpoint="POSTapi-campaign-blueprints"
               value="Professional but relaxed"
               data-component="body">
    <br>
<p>Writing tone. Example: <code>Professional but relaxed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_hashtags</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_hashtags"                data-endpoint="POSTapi-campaign-blueprints"
               value="1"
               data-component="body">
    <br>
<p>Maximum number of hashtags. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_characters</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_characters"                data-endpoint="POSTapi-campaign-blueprints"
               value="280"
               data-component="body">
    <br>
<p>Maximum hook length. Example: <code>280</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>additional_rules</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="additional_rules"                data-endpoint="POSTapi-campaign-blueprints"
               value="Avoid buzzwords and end with a concrete lesson."
               data-component="body">
    <br>
<p>Extra writing constraints. Example: <code>Avoid buzzwords and end with a concrete lesson.</code></p>
        </div>
        </form>

                    <h2 id="campaign-blueprints-GETapi-campaign-blueprints--id-">Show a campaign blueprint.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-campaign-blueprints--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/campaign-blueprints/16" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/campaign-blueprints/16"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-campaign-blueprints--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campaign-blueprints--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campaign-blueprints--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campaign-blueprints--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campaign-blueprints--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campaign-blueprints--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campaign-blueprints--id-" data-method="GET"
      data-path="api/campaign-blueprints/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campaign-blueprints--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campaign-blueprints--id-"
                    onclick="tryItOut('GETapi-campaign-blueprints--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campaign-blueprints--id-"
                    onclick="cancelTryOut('GETapi-campaign-blueprints--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campaign-blueprints--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campaign-blueprints/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-campaign-blueprints--id-"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campaign-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campaign-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-campaign-blueprints--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the campaign blueprint. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="campaign-blueprints-PUTapi-campaign-blueprints--id-">Update a campaign blueprint.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-campaign-blueprints--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/campaign-blueprints/16" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Sharper launch posts\",
    \"tone\": \"Direct and technical\",
    \"max_hashtags\": 1,
    \"max_characters\": 240,
    \"additional_rules\": \"Use short paragraphs and no generic motivational line.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/campaign-blueprints/16"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Sharper launch posts",
    "tone": "Direct and technical",
    "max_hashtags": 1,
    "max_characters": 240,
    "additional_rules": "Use short paragraphs and no generic motivational line."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-campaign-blueprints--id-">
</span>
<span id="execution-results-PUTapi-campaign-blueprints--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-campaign-blueprints--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-campaign-blueprints--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-campaign-blueprints--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-campaign-blueprints--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-campaign-blueprints--id-" data-method="PUT"
      data-path="api/campaign-blueprints/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-campaign-blueprints--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-campaign-blueprints--id-"
                    onclick="tryItOut('PUTapi-campaign-blueprints--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-campaign-blueprints--id-"
                    onclick="cancelTryOut('PUTapi-campaign-blueprints--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-campaign-blueprints--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/campaign-blueprints/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/campaign-blueprints/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-campaign-blueprints--id-"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the campaign blueprint. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="Sharper launch posts"
               data-component="body">
    <br>
<p>Blueprint name. Must not be greater than 255 characters. Example: <code>Sharper launch posts</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tone"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="Direct and technical"
               data-component="body">
    <br>
<p>Writing tone to enforce. Must not be greater than 255 characters. Example: <code>Direct and technical</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_hashtags</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_hashtags"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="1"
               data-component="body">
    <br>
<p>Maximum number of hashtags allowed. Must be at least 0. Must not be greater than 5. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_characters</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_characters"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="240"
               data-component="body">
    <br>
<p>Maximum hook length. Must be at least 1. Must not be greater than 280. Example: <code>240</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>additional_rules</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="additional_rules"                data-endpoint="PUTapi-campaign-blueprints--id-"
               value="Use short paragraphs and no generic motivational line."
               data-component="body">
    <br>
<p>Extra style constraints for the AI. Must not be greater than 5000 characters. Example: <code>Use short paragraphs and no generic motivational line.</code></p>
        </div>
        </form>

                    <h2 id="campaign-blueprints-DELETEapi-campaign-blueprints--id-">Delete a campaign blueprint.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-campaign-blueprints--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/campaign-blueprints/16" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/campaign-blueprints/16"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-campaign-blueprints--id-">
</span>
<span id="execution-results-DELETEapi-campaign-blueprints--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-campaign-blueprints--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-campaign-blueprints--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-campaign-blueprints--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-campaign-blueprints--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-campaign-blueprints--id-" data-method="DELETE"
      data-path="api/campaign-blueprints/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-campaign-blueprints--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-campaign-blueprints--id-"
                    onclick="tryItOut('DELETEapi-campaign-blueprints--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-campaign-blueprints--id-"
                    onclick="cancelTryOut('DELETEapi-campaign-blueprints--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-campaign-blueprints--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/campaign-blueprints/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-campaign-blueprints--id-"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-campaign-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-campaign-blueprints--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-campaign-blueprints--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the campaign blueprint. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="content-generation">Content Generation</h1>

    

                                <h2 id="content-generation-POSTapi-content-repurpose">Submit raw content for repurposing.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Creates a raw-content record and queues the Grok generation job. The HTTP request returns immediately.</p>

<span id="example-requests-POSTapi-content-repurpose">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/content/repurpose" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"campaign_blueprint_id\": 1,
    \"content\": \"Today I refactored a queue worker and learned that idempotency matters more than retries.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/content/repurpose"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "campaign_blueprint_id": 1,
    "content": "Today I refactored a queue worker and learned that idempotency matters more than retries."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-content-repurpose">
</span>
<span id="execution-results-POSTapi-content-repurpose" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-content-repurpose"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-content-repurpose"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-content-repurpose" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-content-repurpose">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-content-repurpose" data-method="POST"
      data-path="api/content/repurpose"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-content-repurpose', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-content-repurpose"
                    onclick="tryItOut('POSTapi-content-repurpose');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-content-repurpose"
                    onclick="cancelTryOut('POSTapi-content-repurpose');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-content-repurpose"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/content/repurpose</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-content-repurpose"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-content-repurpose"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-content-repurpose"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>campaign_blueprint_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campaign_blueprint_id"                data-endpoint="POSTapi-content-repurpose"
               value="1"
               data-component="body">
    <br>
<p>Existing campaign blueprint id owned by the authenticated user. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-content-repurpose"
               value="Today I refactored a queue worker and learned that idempotency matters more than retries."
               data-component="body">
    <br>
<p>Raw notes, markdown, or experience report to repurpose. Example: <code>Today I refactored a queue worker and learned that idempotency matters more than retries.</code></p>
        </div>
        </form>

                    <h2 id="content-generation-GETapi-raw-contents">List raw content submissions.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-raw-contents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/raw-contents" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/raw-contents"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-raw-contents">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-raw-contents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-raw-contents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-raw-contents"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-raw-contents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-raw-contents">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-raw-contents" data-method="GET"
      data-path="api/raw-contents"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-raw-contents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-raw-contents"
                    onclick="tryItOut('GETapi-raw-contents');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-raw-contents"
                    onclick="cancelTryOut('GETapi-raw-contents');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-raw-contents"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/raw-contents</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-raw-contents"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-raw-contents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-raw-contents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="content-generation-GETapi-raw-contents--rawContent_id-">Show a raw content submission.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-raw-contents--rawContent_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/raw-contents/16" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/raw-contents/16"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-raw-contents--rawContent_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-raw-contents--rawContent_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-raw-contents--rawContent_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-raw-contents--rawContent_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-raw-contents--rawContent_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-raw-contents--rawContent_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-raw-contents--rawContent_id-" data-method="GET"
      data-path="api/raw-contents/{rawContent_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-raw-contents--rawContent_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-raw-contents--rawContent_id-"
                    onclick="tryItOut('GETapi-raw-contents--rawContent_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-raw-contents--rawContent_id-"
                    onclick="cancelTryOut('GETapi-raw-contents--rawContent_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-raw-contents--rawContent_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/raw-contents/{rawContent_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-raw-contents--rawContent_id-"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-raw-contents--rawContent_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-raw-contents--rawContent_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>rawContent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rawContent_id"                data-endpoint="GETapi-raw-contents--rawContent_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the rawContent. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="generated-posts">Generated Posts</h1>

    

                                <h2 id="generated-posts-GETapi-generated-posts">List generated posts.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Returns the authenticated creator's generated posts with their raw content and blueprint context.</p>

<span id="example-requests-GETapi-generated-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/generated-posts" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/generated-posts"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-generated-posts">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-generated-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-generated-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-generated-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-generated-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-generated-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-generated-posts" data-method="GET"
      data-path="api/generated-posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-generated-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-generated-posts"
                    onclick="tryItOut('GETapi-generated-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-generated-posts"
                    onclick="cancelTryOut('GETapi-generated-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-generated-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/generated-posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-generated-posts"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-generated-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-generated-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="generated-posts-GETapi-generated-posts--generatedPost_id-">Show a generated post.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-generated-posts--generatedPost_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/generated-posts/16" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/generated-posts/16"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-generated-posts--generatedPost_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-generated-posts--generatedPost_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-generated-posts--generatedPost_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-generated-posts--generatedPost_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-generated-posts--generatedPost_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-generated-posts--generatedPost_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-generated-posts--generatedPost_id-" data-method="GET"
      data-path="api/generated-posts/{generatedPost_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-generated-posts--generatedPost_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-generated-posts--generatedPost_id-"
                    onclick="tryItOut('GETapi-generated-posts--generatedPost_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-generated-posts--generatedPost_id-"
                    onclick="cancelTryOut('GETapi-generated-posts--generatedPost_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-generated-posts--generatedPost_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/generated-posts/{generatedPost_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-generated-posts--generatedPost_id-"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-generated-posts--generatedPost_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-generated-posts--generatedPost_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>generatedPost_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="generatedPost_id"                data-endpoint="GETapi-generated-posts--generatedPost_id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the generatedPost. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="generated-posts-PATCHapi-generated-posts--generatedPost_id--status">Update generated post status.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Moves a generated post between draft, archived, and posted.</p>

<span id="example-requests-PATCHapi-generated-posts--generatedPost_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/generated-posts/16/status" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"posted\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/generated-posts/16/status"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "posted"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-generated-posts--generatedPost_id--status">
</span>
<span id="execution-results-PATCHapi-generated-posts--generatedPost_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-generated-posts--generatedPost_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-generated-posts--generatedPost_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-generated-posts--generatedPost_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-generated-posts--generatedPost_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-generated-posts--generatedPost_id--status" data-method="PATCH"
      data-path="api/generated-posts/{generatedPost_id}/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-generated-posts--generatedPost_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-generated-posts--generatedPost_id--status"
                    onclick="tryItOut('PATCHapi-generated-posts--generatedPost_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-generated-posts--generatedPost_id--status"
                    onclick="cancelTryOut('PATCHapi-generated-posts--generatedPost_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-generated-posts--generatedPost_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/generated-posts/{generatedPost_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-generated-posts--generatedPost_id--status"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-generated-posts--generatedPost_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-generated-posts--generatedPost_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>generatedPost_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="generatedPost_id"                data-endpoint="PATCHapi-generated-posts--generatedPost_id--status"
               value="16"
               data-component="url">
    <br>
<p>The ID of the generatedPost. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-generated-posts--generatedPost_id--status"
               value="posted"
               data-component="body">
    <br>
<p>One of draft, archived, posted. Example: <code>posted</code></p>
        </div>
        </form>

                <h1 id="ghostwriter-assistant">Ghostwriter Assistant</h1>

    

                                <h2 id="ghostwriter-assistant-POSTapi-generated-posts--generatedPost_id--chat">Chat with a generated post.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Starts or continues a remembered ghostwriter conversation for one generated post.</p>

<span id="example-requests-POSTapi-generated-posts--generatedPost_id--chat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/generated-posts/16/chat" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"message\": \"Give me 3 sharper hooks.\",
    \"conversation_id\": \"0197a467-7ac1-7000-8bbf-ccdf6b1c9261\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/generated-posts/16/chat"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "message": "Give me 3 sharper hooks.",
    "conversation_id": "0197a467-7ac1-7000-8bbf-ccdf6b1c9261"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-generated-posts--generatedPost_id--chat">
</span>
<span id="execution-results-POSTapi-generated-posts--generatedPost_id--chat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-generated-posts--generatedPost_id--chat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-generated-posts--generatedPost_id--chat"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-generated-posts--generatedPost_id--chat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-generated-posts--generatedPost_id--chat">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-generated-posts--generatedPost_id--chat" data-method="POST"
      data-path="api/generated-posts/{generatedPost_id}/chat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-generated-posts--generatedPost_id--chat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-generated-posts--generatedPost_id--chat"
                    onclick="tryItOut('POSTapi-generated-posts--generatedPost_id--chat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-generated-posts--generatedPost_id--chat"
                    onclick="cancelTryOut('POSTapi-generated-posts--generatedPost_id--chat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-generated-posts--generatedPost_id--chat"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/generated-posts/{generatedPost_id}/chat</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-generated-posts--generatedPost_id--chat"
               value="Bearer {BEARER_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {BEARER_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-generated-posts--generatedPost_id--chat"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-generated-posts--generatedPost_id--chat"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>generatedPost_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="generatedPost_id"                data-endpoint="POSTapi-generated-posts--generatedPost_id--chat"
               value="16"
               data-component="url">
    <br>
<p>The ID of the generatedPost. Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message"                data-endpoint="POSTapi-generated-posts--generatedPost_id--chat"
               value="Give me 3 sharper hooks."
               data-component="body">
    <br>
<p>Natural-language instruction or question. Example: <code>Give me 3 sharper hooks.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>conversation_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="conversation_id"                data-endpoint="POSTapi-generated-posts--generatedPost_id--chat"
               value="0197a467-7ac1-7000-8bbf-ccdf6b1c9261"
               data-component="body">
    <br>
<p>Optional conversation id returned by a previous chat response. Example: <code>0197a467-7ac1-7000-8bbf-ccdf6b1c9261</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
