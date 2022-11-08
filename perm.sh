echo "Assiging permissions to users..."
bin/cake acl_extras aco_sync
bin/cake cache clear_all
echo "*************** Assign Admin Permissions  *******************"
#Admin permissions
bin/cake acl grant Roles.1 controllers