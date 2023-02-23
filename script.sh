
Create a blank project in the current directory

    composer create-project --prefer-dist cakephp/app:^3.10 technical

Fire up the project by:

    bin/cake server

Update database credentials in app.php file 

Create a new migration file 

    bin/cake bake migration CreateRoles

Update the created migration file with the following:

$table->addColumn('name', 'string', ['limit' => 50]) 
->addColumn('description', 'text', ['null' => true]) 
->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP']) ->addColumn('modified', 'datetime', ['default' => 'CURRENT_TIMESTAMP']
)->create();

RUN 
    bin/cake migrations migrate       // to apply migrations to the database
