<h1>Simple Modules</h1>
<p>Modules in FUEL can range from simple forms to a complex, interactive, multi-page interface. 
<strong>Simple</strong> modules don't require additional views and controllers to be created. 
Common examples of simple modules include events, news and job postings.</p>
<p>For more on creating a simple module, <a href="<?=user_guide_url('modules/tutorial')?>">view the user guide's tutorial</a>.</p>

<h2>Configuring</h2>
<p>A simple module usually contains a single model that maps to a database table (e.g. news). 
It is recommended that you create your model first (<a href="<?=user_guide_url('modules/tutorial#authors_model')?>">click here for an example</a>).
After your model has been created, you can activate and configure the module in the <dfn>config/MY_fuel_modules.php</dfn> file like so:</p>

<pre class="brush: php">
$config['modules']['example'] = array();
</pre>

<p>This will create a module that maps to the model named <dfn>example_model</dfn> and will have the friendly name of <dfn>Example</dfn>.</p>

<p>The above could actually be written a longer way as follows:</p>
<pre class="brush: php">
$config['modules']['example'] = array(
    'module_name' => 'Example',
    'module_uri' => 'example',
    'model_name' => 'example_model',
    'model_location' => '',
    'display_field' => 'name',
    'preview_path' => '',
    'permission' => 'example',
    'instructions' => 'Here you can manage the examples for your site.',
    'archivable' => TRUE,
    'nav_selected' => 'example'
);
</pre>

<h3>Additional Configuration Parameters</h3>

<p>Below is a list of all the parameters you can specify to further customize your module. Many of them base their default values
on the key value specified in the config (e.g. example):</p>

<table border="0" cellspacing="1" cellpadding="0" class="tableborder">
	<tbody>
		<tr>
			<th>Preference</th>
			<th>Default Value</th>
			<th>Options</th>
			<th>Description</th>
		</tr>
		<tr>
			<td><strong>module_name</strong></td>
			<td>The default value is a <a href="http://ellislab.com/codeigniter/user-guide/helpers/inflector_helper.html" target="_blank">humanized</a> version of the module key (e.g. a key of example = Example)</td>
			<td>None</td>
			<td>the friendly name of the module.</td>
		</tr>
		<tr>
			<td><strong>module_uri</strong></td>
			<td>The default is the module key (e.g. example)</td>
			<td>None</td>
			<td>the URI path to the module that will appear after <dfn>fuel</dfn>.</td>
		</tr>
		<tr>
			<td><strong>model_name</strong></td>
			<td>The default is the module key with the suffix of <strong>_model</strong> (e.g. example_model)</td>
			<td>None</td>
			<td>the name of the model</td>
		</tr>
		<tr>
			<td><strong>model_location</strong></td>
			<td>By default it will look in the application/model folder. If a value is given it will look in the <dfn>modules/{model_location}/model</dfn> folder</td>
			<td>None</td>
			<td>The module folder location of the model.</td>
		</tr>
		<tr>
			<td><strong>view_location</strong></td>
			<td>By default it will look in the application/views folder. If a value is given it will look in the <dfn>modules/{view_location}/views</dfn> folder</td>
			<td>None</td>
			<td>the location of the view files</td>
		</tr>
		<tr>
			<td><strong>display_field</strong></td>
			<td>The default is the field <dfn>name</dfn>. If you do not have a field of <dfn>name</dfn>, you must specify a new field</td>
			<td>None</td>
			<td>The model field to be used for display purposes</td>
		</tr>
		<tr>
			<td><strong>js_controller</strong></td>
			<td>The default is BaseFuelController</td>
			<td>None</td>
			<td>The name of the javascript controller. If an array is given, then the key of the array is considered the module folder to look in and the value the name of the controller.
			The <dfn>js_controller_path</dfn> will automatically be changed to the module's assets folder if no <dfn>js_controller_path</dfn> is provided.
			For more information on creating javascript controllers, visit the section on the javascript <a href="<?=user_guide_url('general/javascript#jqx')?>">jqx Framework</a></td>
		</tr>
		<tr>
			<td><strong>js_controller_path</strong></td>
			<td>The default is the path to the fuel module's asset folder (e.g. fuel/modules/fuel/assets/js/</td>
			<td>None</td>
			<td>The base path of where to look for the controller file.</td>
		</tr>
		<tr>
			<td><strong>js_controller_params</strong></td>
			<td>None</td>
			<td>None</td>
			<td>Parameters to pass to the jqx controller. They must be in the form of a json object</td>
		</tr>
		<tr>
			<td><strong>js</strong></td>
			<td>None</td>
			<td>None</td>
			<td>additional javascript files to include for the module</td>
		</tr>
		<tr>
			<td><strong>preview_path</strong></td>
			<td>None</td>
			<td>None</td>
			<td>The URI path to preview the information from the module in the website</td>
		</tr>
		<tr>
			<td><strong>views</strong></td>
			<td>Built in FUEL pages</td>
			<td>None</td>
			<td>View files for the list, form and delete pages</td>
		</tr>
		<tr>
			<td><strong>permission</strong></td>
			<td>The default is the module key (e.g. <dfn>example</dfn>)</td>
			<td>None</td>
			<td>The name of the permission that users must be subscribed to to have access to the module.</td>
		</tr>
		<tr>
			<td><strong>edit_method</strong></td>
			<td>The default is <dfn>find_one_array</dfn> filtered on the id value passed to the form</td>
			<td>None</td>
			<td>The model's method to retrieve the information to edit.</td>
		</tr>
		<tr>
			<td><strong>instructions</strong></td>
			<td>None</td>
			<td>None</td>
			<td>The instructions to provide users when creating or editing</td>
		</tr>
		<tr>
			<td><strong>filters</strong></td>
			<td>None</td>
			<td>None</td>
			<td>Fields to filter the values in the list view</td>
		</tr>
		<tr>
			<td><strong>archivable</strong></td>
			<td>TRUE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>Saves to the archive table for later retrieval if you need to revert back</td>
		</tr>
		<tr>
			<td><strong>table_actions</strong></td>
			<td>EDIT, VIEW, DELETE</td>
			<td>None</td>
			<td>The actions per row to include in the table view </td>
		</tr>
		<tr>
			<td><strong>item_actions</strong></td>
			<td>save, view, publish, activate, delete, duplicate, create</td>
			<td>save, view, publish, activate, delete, duplicate, create, others</td>
			<td>The form level actions to include in the toolbar. 
				The <dfn>others</dfn> action is a key / value array with the key being the FUEL URI and the value being the button label.
				It can be used to create additional custom buttons. Each button will submit the form information on the page to the link path of the button.
			</td>
		</tr>
		<tr>
			<td><strong>list_actions</strong></td>
			<td>None</td>
			<td>None</td>
			<td>Other HTML to be displayed at the top above the list table</td>
		</tr>
		<tr>
			<td><strong>rows_selectable</strong></td>
			<td>TRUE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>A boolean value that will set the whole row to be clickable</td>
		</tr>
		<tr>
			<td><strong>precedence_col</strong></td>
			<td>precedence</td>
			<td>None</td>
			<td>The name of the column to contain the custom precedence sorting information</td>
		</tr>
		<tr>
			<td><strong>clear_cache_on_save</strong></td>
			<td>TRUE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>Clears the cache upon saving new or updated values to a record</td>
		</tr>
		<tr>
			<td><strong>create_action_name</strong></td>
			<td>Create</td>
			<td>None</td>
			<td>The name of the button to be used for creating an item</td>
		</tr>
		<tr>
			<td><strong>configuration</strong></td>
			<td>None</td>
			<td>None</td>
			<td>Additional configuration files to load</td>
		</tr>
		<tr>
			<td><strong>nav_selected</strong></td>
			<td>None</td>
			<td>None</td>
			<td>The left navigation item to be selected</td>
		</tr>
		<tr>
			<td><strong>table_headers</strong></td>
			<td>None</td>
			<td>None</td>
			<td>The columns to use for the table view</td>
		</tr>
		<tr>
			<td><strong>default_col</strong></td>
			<td>The default is the second column of the table (e.g. the one normally after the id column)</td>
			<td>None</td>
			<td>The default field to sort on</td>
		</tr>
		<tr>
			<td><strong>default_order</strong></td>
			<td>asc</td>
			<td>asc, desc</td>
			<td>The default field ordering</td>
		</tr>
		<tr>
			<td><strong>sanitize_input</strong></td>
			<td>TRUE</td>
			<td>Boolean TRUE/FALSE, string of "xss", "php", "template" OR "entities", OR an array for multiple values e.g. array('xss', 'php', 'template', 'entities'). See the FUEL <a href="<?=user_guide_url('installation/configuration')?>">configuration</a> for changing the different sanitization callbacks.</td>
			<td>Cleans the input before inserting or updating the data source</td>
		</tr>
		<tr>
			<td><strong>sanitize_files</strong>  (was sanitize_images)</td>
			<td>TRUE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>uses xss_clean function on images</td>
		</tr>
		<tr>
			<td><strong>displayonly</strong></td>
			<td>None</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>Will only display the data and not allow you to save it</td>
		</tr>
		<tr>
			<td><strong>language</strong></td>
			<td>None</td>
			<td>None</td>
			<td>Additional language files to load</td>
		</tr>
		<tr>
			<td><strong>language_col</strong></td>
			<td>language</td>
			<td>None</td>
			<td>The column name that contains the language key value</td>
		</tr>
		<tr>
			<td><strong>hidden</strong></td>
			<td>FALSE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>If set to TRUE, it will hide the module in the admin menu</td>
		</tr>
		<tr>
			<td><strong>disabled</strong></td>
			<td>FALSE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>If set to TRUE, it will hide the module in the admin menu as well as show a 404</td>
		</tr>
		<tr>
			<td><strong>icon_class</strong></td>
			<td>None</td>
			<td>None</td>
			<td>The CSS icon class to associate with the module</td>
		</tr>
		<tr>
			<td><strong>folder</strong></td>
			<td>None</td>
			<td>None</td>
			<td>The advanced module folder in which it lives in</td>
		</tr>
		<tr>
			<td><strong>exportable</strong></td>
			<td>FALSE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>Will display an "Export" button on the list view page that will allow users to export the currently filtered list data</td>
		</tr>
		<tr>
			<td><strong>limit_options</strong></td>
			<td>array('25' => '25', '50' => '50', '100' => '100')</td>
			<td>array</td>
			<td>The "Show" options displayed in the list view</td>
		</tr>
		<tr>
			<td><strong>advanced_search</strong></td>
			<td>FALSE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>If TRUE, this will display model filters in an advanced search menu</td>
		</tr>
		<tr>
			<td><strong>disable_heading_sort</strong></td>
			<td>FALSE</td>
			<td>Boolean Value TRUE/FALSE</td>
			<td>If TRUE, this will disable heading sorting on the list view</td>
		</tr>
		<tr>
			<td><strong>description</strong></td>
			<td>None</td>
			<td>None</td>
			<td>A description value that can be used in the site docs</td>
		</tr>
		<tr>
			<td><strong>pages</strong></td>
			<td>array</td>
			<td>None</td>
			<td>Can automatically generate pages for your module including list pages, detail pages, related category and tag pages, search pages and your own custom pages. Leverages
				by default the fuel/application/views/_posts/ view files but that can be overwritten.
<pre>'pages' => array(
'base_uri' => 'media',
'layout' => 'posts',
'list' => 'media/list',
'post' => 'media/detail',
'archive' => array('route' => 'media/archive(/$year:\d{4})(/$month:\d{1,2})?(/$day:\d{1,2})?', 'view' => 'media/list', 'layout' => 'main', 'method' => 'my_test_method', 'empty_data_show_404' => TRUE),
'tag' => array('route' => 'media/tag/($tag:.+)', 'layout' => 'main', 'view' => 'media/list', 'empty_data_show_404' => TRUE),
'custom' =>array('route' => 'media/custom', 'view' => 'media/list', 'method' => 'my_custom_method'));</pre>

			</td>
		</tr>
	</tbody>
</table>


<h2 id="model">The Model</h2>
<p>The module's model is the most important piece of a module. It is what drives the the saving, form and extra interactions needed for the module to work.
A module should extend the abstract <a href="<?=user_guide_url('libraries/base_module_model')?>">Base_module_model</a> 
class which is a child of the MY_Model class and is found in the <dfn>modules/fuel/model</dfn> folder. 
Custom record object should extend the <a href="<?=user_guide_url('libraries/base_module_model#base_module_record')?>">Base_module_record</a>
<p>

<p>There are several methods that you can add/overwrite to give you greater functionality for your module (<a href="<?=user_guide_url('modules/tutorial')?>">view the tutorial for more information</a>).
</p>

<ul>
	<li>list_items()</li>
	<li>tree()</li>
	<li>form()</li>
</ul>

<p>Additionally, there are <a href="<?=user_guide_url('libraries/my_model#hooks')?>">several hooks</a> you may want to use that allow you to insert functionality during the saving and deleting process of a modules record.</p>

<h2 id="views">The Views</h2>
<p>Simple modules are made up of several views:</p>
<ul>
	<li><a href="<?=user_guide_url('introduction/interface#list_view')?>"><strong>List view</strong></a> - where you can filter and select from a list and edit, delete or preview.</li>
	<li><a href="<?=user_guide_url('introduction/interface#edit_view')?>"><strong>Form view</strong></a> - the form view that allows you to edit or input new records for the module</li>
	<li><strong>Tree view (optional)</strong> - provides a tree like hierarchical structure. Requires a tree method on the module's model that follows the hierarchical <dfn>Menu</dfn> structure</li>
	<li><strong>Preview view (optional)</strong> - the URO to the website to preview the module</li>
</ul>

<h2 id="overwrites">Module Overwrites</h2>
<p>Module overwrites allow for you to overwrite existing module parameters. For example, if you'd like to overwrite the built-in FUEL fuel_pages_model to incorporate your own model hook you've added to the MY_pages_model,
you can do so like so:</p>
<pre class="brush:php">
$config['module_overwrites']['pages']['model_name'] = 'MY_pages_model';
</pre>


<h2 id="post_pages">Generated Post Pages</h2>
<p>New to FUEL CMS 1.3 is the ability to create post type pages automatically from your modules. 
This is a very powerful future that allows you to map routes to post pages that have specific behaviors. 
This means each module can now have blog like features (minus the commenting). 
It uses the <a href="<?=user_guide_url('libraries/fuel_posts')?>">Fuel_posts</a> class to do so.
There are a number of types of pages automatically created for you 
(basically the ones we were tired of creating over and over again) including, slug, archive, list, post, tag and archive pages. 
For example, if you have a module's model that has a <dfn>foreign_key</dfn> property to the <dfn>fuel_categories_model</dfn> and a <dfn>has_many</dfn> to the <dfn>fuel_tags_model</dfn>,
tag and category pages can be automatically generated using the <dfn>pages</dfn> parameter. 
To make it easier, there is a <dfn>Base_posts_model</dfn> class that your module's model can inherit from (which already inherits from the Base_module_model class).
</p>

<p>Below is an example of an "articles" module with the pages parameter being used in a module's configuration:</p>

<p>The articles SQL:</p>
<pre class="brush:php">
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `featured` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `publish_date` datetime NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
</pre>

<p>The module's model (note that it inherits from the Base_posts_model):</p>
<pre class="brush:php">
&lt;?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_posts_model.php');

class Articles_model extends Base_posts_model {

	public $name = 'articles';

	
	function list_items($limit = NULL, $offset = NULL, $col = 'publish_date', $order = 'desc', $just_count = FALSE)
	{
		// add any $this->db->select('....') or $this->db->join(...) here
		$data  = parent::list_items($limit, $offset, $col, $order, $just_count);
		return $data;
	}
	
	function form_fields($values = array(), $related = array())
	{	
		$fields = parent::form_fields($values, $related);
		
		// put in your own specific code to manipulate the fields here
		return $fields;
	}
}

class Articles_item_model extends Base_post_item_model {

}
</pre>

<p>The following global page parameters can be used with the pages parameter for your module:</p>
<ul>
	<li><strong>base_uri</strong>: the main base URI path to the</li>
	<li><strong>layout</strong>: the main layout to be used for the pages generated that don't have it explicitly specified </li>
	<li><strong>vars</strong>: an array of variables to be sent to the generate pages</li>
	<li><strong>per_page</strong>: how many pages to display per page if pagination is needed</li>
</ul>
<br>
<p>Additionally, each slug, archive, list, post, tag and archive page can have it's own parameters specified like so:</p>
<ul>
	<li><strong>route</strong>: the route to the pages. Note in the example below that you can specify the URI parameter variable names by prefixing <dfn>$name:</dfn> in the captured area (e.g. (/$year:\d{4})) </li>
	<li><strong>view</strong>: the view to use for the page. By default, it will look in the <span class="file">application/views/_posts</span> folder</li>
	<li><strong>layout</strong>: will overwrite the global layout specified</li>
	<li><strong>method</strong>: the method on the model to use for getting the data. If nothing is specified it will use the defaults in the <a href="<?=user_guide_url('libraries/fuel_posts')?>">Fuel_post class</a></li>
	<li><strong>vars</strong>: specific page variables to pass to the pages at the specified route</li>
	<li><strong>per_page</strong>: will overwrite global page parameter setting for many pages to display per page if pagination is needed</li>
	<li><strong>empty_data_show_404</strong>: determines whether to display a 404 error if the data is empty or not</li>
</ul>
<br>
<p>Lastly, you can of course create your own custom set of pages generated by your module and are not limited to the default. To do this, take advantage of the <dfn>method</dfn> parameter and specify a method
on your model to generate the data you want to pass to your view and specify a relevant <dfn>route</dfn> parameter.</p>

<p>Below is an example of the pages parameter being used in a module's configuration with an example of a way to define "custom" generated pages:</p>
<pre class="brush:php">
...
'pages' => array(
	'base_uri' => 'media',
	'per_page' => 10,
	'layout' => 'posts',
	'list' => 'media/list',
	'post' => 'media/detail',
	'archive' => array('route' => 'media/archive(/$year:\d{4})(/$month:\d{1,2})?(/$day:\d{1,2})?', 'view' => 'media/list', 'layout' => 'main', 'method' => 'my_test_method', 'empty_data_show_404' => TRUE),
	'tag' => array('view' => 'media/list', 'empty_data_show_404' => TRUE, 'per_page' => 5),
	'custom' => array('route' => 'media/custom', 'view' => 'media/list', 'method' => 'my_custom_method')
),
...
</pre>


<h2 id="custom_model_classes">Separate Classes for Model Logic</h2>
<p>For larger models, things like the form_fields method and the validation logic and even the related items area can become a bit much to have in one model. FUEL 1.3 added the ability
to inherit from three new classes to make it easier to separate that logic out. To add this functionality, there are now three new properties that can be utilized on a module model:</p>

<pre class="brush:php">
public $form_fields_class = '';  // a class that can extend Base_model_fields and manipulate the form_fields method
public $validation_class = ''; // a class that can extend Base_model_validation and manipulate the validate method by adding additional validation to the model
public $related_items_class = ''; // a class that can extend Base_model_related_items and manipulate what is displayed in the related items area (right side of page)
</pre>

<h3>Custom Classes</h3>
<p>All custom classes come with the following methods that can be used with the class</p>
<ul>
	<li><strong>set_parent_model</strong>: Sets the main parent model (done upon initilaization)</li>
	<li><strong>get_parent_model</strong>: Returns the main parent model</li>
	<li><strong>set_values</strong>: Sets the current record's values (if any... done upon initialization)</li>
	<li><strong>append_values</strong>: Appends values to the existing values store.</li>
	<li><strong>get_values</strong>: Returns an array of the values stored</li>
	<li><strong>get_value</strong>: Returns a specific value and must pass the key name of the value</li>
	<li><strong>record</strong>: Returns a record object of the current records value (if any)</li>
</ul>

<h3>Custom Form Fields Class</h3>
<p>To create your own custom form fields class, specify the class name for the model's $form_fields_class property, 
	and then create a class that inherits from Base_model_fields (see below).
	In the initialize method, you can specify your field logic or even break it out into additional methods to keep it better organized. 
	The example below does this and creates separate "Info" and "Meta" tabs.
</p>

<pre class="brush:php">
&lt;?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Articles_model extends Base_module_model {
	...
	public $form_fields_class = 'Article_fields';  // a class that can extend Base_model_fields and manipulate the form_fields method
	...
}

// --------------------------------------------------------------------

class Article_model extends Base_module_record {
	
	// put your record model code here
}

// --------------------------------------------------------------------

class Article_fields extends Base_model_fields {

	public function initialize($fields = array(), $values = array(), $parent_model = NULL)
	{
		$fields =&amp; $this->fields;

		$this->set_label('title', 'Headline');
	
		$this->remove(array('date_added'));

		$this->info_tab();
		$this->meta_tab();
	}

	public function info_tab()
	{
		$info_fields = array('title', 'slug', 'content', 'excerpt', 'image');
		$this->tab('Info', $info_fields);
	}

	public function meta_tab()
	{
		$meta_fields = array('tags', 'category_id');
		$this->tab('Meta', $meta_fields);
	}
}
</pre>
<p>The <dfn>Base_model_fields</dfn> class provides the follow additional methods:</p>
<ul>
	<li><strong>set_fields</strong>: Sets the fields for the object and happens upon initialization</li>
	<li><strong>get_fields</strong>: Returns an array of field information</li>
	<li><strong>get_field</strong>: Returns a single field's information</li>
	<li><strong>set</strong>: Sets a field's information</li>
	<li><strong>get</strong>: Returns a single field's information</li>
	<li><strong>remove</strong>: Removes a field</li>
	<li><strong>tab</strong>: Creates a tab with the specified fields</li>
	<li><strong>clear</strong>: Clears the field information</li>
	<li><strong>reorder</strong>: Reorders the fields in the specified order</li>
</ul>
<p>Note that in the example above the various ways to conveniently set field properties using the "set_" magic method. You can mass assign values to multiple fields. 
Below is an example of how to hide multiple fields at once:</p>
<pre class="brush:php">
	$this->set_type(array('field1', 'field2'), 'hidden');
</pre>

<p>Additionally you can specify a single property by passing an array:</p>
<pre class="brush:php">
	$this->set_comment(array('field1' => 'Comment 1', 'field2' => 'Comment 2'));
</pre>

<p>Lastly, you can just create a single field value using just the <dfn>set</dfn> method:</p>
<pre class="brush:php">
	$this->set('field1', array('label' => 'Field 1 label', 'type' => 'textarea'));
</pre>


<h3>Custom Validation Class</h3>
<p>A custom validation class is convenient for separating your model validation logic outside of your model class. The following are additional methods that can be used on the validation class:</p>
<ul>
	<li><strong>add</strong>: Adds a validation rule using the <a href="<?=user_guide_url('libraries/validator')?>">Validator</a> class that is set on the parent model</li>
	<li><strong>remove</strong>: Removes a validation rule</li>
	<li><strong>validate</strong>: Runs through the validation rules to validate</li>
</ul>

<h3>Custom Validation Class</h3>
<ul>
	<li><strong>add</strong>: Adds a validation rule using the <a href="<?=user_guide_url('libraries/validator')?>">Validator</a> class that is set on the parent model</li>
	<li><strong>remove</strong>: Removes a validation rule</li>
	<li><strong>validate</strong>: Runs through the validation rules to validate and returns a boolean value</li>
</ul>

<pre class="brush:php">
...
class Article_validation extends Base_model_validation {

	public function initialize($record, $parent_model)
	{
		// passing additional parameters can be done either as a colon after the key in a second array parameter or in an array as the 4th option)
		$this->add('submitted_by_id', 'is_equal_to', 'The submitter ID needs to equal 2', array(2));
		$this->add('submitted_by_id', array('is_equal_to:2' => 'The submitter ID needs to equal 2'));
	}
}
</pre>