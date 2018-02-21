# Instruction to update prod configs `./config/autoload/aws` :
1. Create a ticket at ITCM Project "https://digitalroominc.atlassian.net/projects/ITCM/summary" for the change
2. Link this issue to the prod deployment ticket.
3. Link the issue in a way that, "change in config" must be done before the prod deployment ticket.

About this directory:
=====================

By default, this application is configured to load all configs in
`./config/autoload/{,*.}{global,local}.php`. Doing this provides a
location for a developer to drop in configuration override files provided by
modules, as well as cleanly provide individual, application-wide config files
for things like database connections, etc.
