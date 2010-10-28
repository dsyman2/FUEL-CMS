<h1>Installing FUEL CMS</h1>
<p>The following are steps to installing FUEL:</p>
<ol>
	<li>Download the latest version from <a href="http://www.getfuelcms.com" target="_blank">getfuelcms.com</a></li>
	<li>Place the <dfn>web</dfn> folder onto your webserver and make sure your <dfn>data_backup</dfn>, <dfn>install</dfn> and <dfn>crons</dfn> folders are in a folder inaccessible to the web <strong>(the .htaccess file has these blocked by default so you may not need to do anything)</strong>.</li>
	<li>Browse to the index page. <kbd>NOTE: Windows users will need to change the INSTALL_ROOT variable at the top of the page to server path of the fuel folder.</kbd></li>
	<li>Install the database by first creating the database in MySQL and then running the fuel_schema.sql file found at the root of the downloaded FUEL folder</li>
	<li>Configure the <dfn>config/database</dfn> file with the proper database connection settings (like with any other CodeIgniter database application)</li>
	<li>Make the following folders writable:
		<ul>
			<li class="<?=(is_writable(BASEPATH.'cache/')) ? 'success' : 'error'; ?>">
				<?=BASEPATH.'cache/'?>
			</li>
			<li class="<?=(is_writable(assets_server_path('', 'images'))) ? 'success' : 'error'; ?>">
				<?=assets_server_path('', 'images')?>
			</li>
		</ul>
	</li>
	<li>Alter your Apache .htaccess file to the proper web root directory</li>
</ol>

<p>That's it!</p>

<p class="important">Certain modules may require their own configuration and database sql files to be run. Please reference their own documentation in the user guide for additional
install information.</p>