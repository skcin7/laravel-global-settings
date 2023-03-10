#!/usr/bin/env bash

echo -e "Deploying App...\n";

GIT_COMMIT_MESSAGE=


DEFAULT_GIT_COMMIT_MESSAGE="Deployment At `date`.";
read -p "Enter Git Commit Message (\"${DEFAULT_GIT_COMMIT_MESSAGE}\"): " GIT_COMMIT_MESSAGE;
if [[ -z "${GIT_COMMIT_MESSAGE}" ]]; then
   GIT_COMMIT_MESSAGE="${DEFAULT_GIT_COMMIT_MESSAGE}";
fi



#npm run prod;

git add -A .

#git commit -m "Deploying with the deploy2.sh deployment script.";
git commit -m "${GIT_COMMIT_MESSAGE}";

git push;

#php artisan application:trigger-deployment;

echo -e "\n...Done!";
