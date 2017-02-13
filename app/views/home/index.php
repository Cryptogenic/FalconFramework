    <!-- Summary Section -->
    <section id="summary" class="summary-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1>Summary</h1>
            <div class="light-seperator"></div>
            <p>
              Falcon Framework is a PHP framework designed to be clean, minimal, and easy to use. It was developed for usage in commercial projects and was shared in the hopes of helping others learn and assisting others in their own projects. Code is heavily documented and it is easy to add or edit existing features of the framework to suit your project's needs. Falcon Framework is currently distributed as version 0.1.
            </p>
            <br />
            <p>
              <div class="note">
                <div class="note-head">
                  Note
                </div>
                <div class="note-seperator"></div>
                <div class="note-body">
                  The login system only serves as an example as well as a test for how a registration system is handled in the framework, and provides functions that can easily be ported and used for your app.
                </div>
              </div>
            </p>
            <div style="margin-top: 20%"></div>
            <a class="btn btn-default page-scroll" href="#setup">See Setup Instructions</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Setup Section -->
    <section id="setup" class="setup-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1>Setting Up Falcon Framework</h1>
            <div class="dark-seperator"></div>
            <div style="overflow: hidden; width: auto; height: 450px; overflow-y: scroll;">
              <div data-scrollbar="true" data-height="450px">
                <p>
                  Falcon Framework is fairly straightforward to use, however there are some things you should know going into your project. Firstly, ensure to read our license! You are free to modify and redistribute edits of Falcon Framework, however the developers will not be held liable. Now, we can get on towards the technical stuff.
                </p>
                <p>
                  The framework utilizes something called a Model View Controller (MVC) design pattern. The controller handles interactions and ensures the end-user gets the view they request. The models handle data and are typically used for things like interacting with MySQL. The view is what the user sees, and should not contain any logic. By default, Falcon Framework abides to these concepts and all implementation of logic is in the controller, not the view. It is recommended you maintain this project if you decide to edit the framework.
                </p>
                <p>
                  The root folder should remain outside of the public web directory, for example in Ubuntu 14.04 LTS you would want these files in <code>/var/</code>. The <code>public folder</code> should be renamed to whatever your operating system or web hosting provider calls the public directory, in some cases it'll be <code>www</code> and in others <code>public_html</code>, ensure to read your server providers' documentation! What's important is everything in the <code>public</code> folder is in the root of the public directory accessible to the web, and everything else (such as docs, app, and tmp folders) should not be in a public directory!
                </p>
                <p>
                  For easibility, we've setup a file called <code>init.php</code> that lies inside of the <code>app</code> folder. This file will contain macros and settings that other files will use for display, MySQL, and other various functions. This file should be the first thing you edit when starting a new project, as it includes macros for things such as the project name, the company name, and MySQL details. See file comments as well as official documentation in the <code>/docs</code> directory for more information. You may want to edit the ending of the <code>ASSET_ROOT</code> macro, as if your app is in something different than the root of your public directory, you'll want to append your project's public path to the end of the macro.
                </p>
                <br />
                <p>
                  Finally, the last important step is to configure the <code>.htaccess</code> file that lies inside your public directory (<code>public</code> folder in stock version), specifically <code>line 4</code>. This line will contain the base path for your project. In most cases, you'll want to leave this as a "/" however if your app is in something different than the root of your public directory, you'll want to append your project's public path to the URL base, similar to the <code>ASSET_ROOT</code> macro in <code>init.php</code>.
                </p>
                <p>
                  Our vanilla framework site should now be appearing on your web-server! You may now edit the framework to your liking and re-work it into your project. You should look at how this site is setup to see how you can utilize the framework and how it all works. Consult the documentation in the <code>docs</code> folder if needed. Good luck!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="download-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1>Download</h1>
            <div class="light-seperator"></div>
            <a href="https://github.com/Cryptogenic/FalconFramework/releases/tag/v1.0">Version 1.0</a>
          </div>
        </div>
      </div>
    </section>
