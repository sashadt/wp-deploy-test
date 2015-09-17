############################################
# Setup Server
############################################

set :stage, :staging
set :stage_url, "http://blog-staging.nextcortex.com"
server "blog.nextcortex.com", user: "webadmin", roles: %w{web app db}
set :deploy_to, "/var/www/html/blog-staging.nextcortex.com"

############################################
# Setup Git
############################################

set :branch, "development"

############################################
# Extra Settings
############################################

#specify extra ssh options:

#set :ssh_options, {
#    auth_methods: %w(password),
#    password: 'password',
#    user: 'username',
#}

#specify a specific temp dir if user is jailed to home
#set :tmp_dir, "/path/to/custom/tmp"
