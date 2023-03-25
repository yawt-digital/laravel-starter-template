#!/bin/bash

readme_location="$(pwd)/README.md"

project_name_placeholder=":project-name"
project_description_placeholder=":project-description"

if test -f "$readme_location"; then
  echo "👀 README.md file found"
else
  echo "❌ README.md file not found. Make sure you're running this script from the root project directory."
  exit 1
fi

# Check if the project name placeholder exists in the README.md file
if grep -q "$project_name_placeholder" "$readme_location"; then
    # Ask the user for the project name
    while true; do
    read -p "Enter the Project Name: " project_name
    if [[ -n "$project_name" ]]; then
        break
    else
        echo "❌ Project name cannot be empty."
    fi
    done

    # Update the README.md file with the project name
    if sed -i '' "s/$project_name_placeholder/$project_name/g" "README.md"; then
    echo "✅ Project name updated in README.md"
    else
    echo "❌ Failed to update project name in README.md"
    exit 1
    fi
fi

# Check if the project description placeholder exists in the README.md file
if grep -q "$project_description_placeholder" "$readme_location"; then
    read -p "Enter a quick description about the project (optional): " project_description

    if [[ -n "$project_description" ]]; then
        if sed -i '' "s/$project_description_placeholder/$project_description/g" "README.md"; then
            echo "✅ Project description updated in README.md"
        else
            echo "❌ Failed to update project description in README.md"
            echo "Try updating it manually. Attempting to continue setup..."
        fi
    fi
fi

echo "🚀 Starting setup..."

cp .env.example .env
docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs || exit 1;

echo "✅ Composer dependencies installed"

# Ask the user if they want continue with the setup and boot Sail'
read -p "Do you want to continue with the setup and boot Sail? (y/n): " continue_setup

if [[ "$continue_setup" =~ ^[Yy]$ ]]; then
    echo "🐳 Starting Sail..."
else
    echo "👍 Okay, you can take it from here. Goodbye!"
    exit 0
fi

./vendor/bin/sail up -d || exit 1;
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate || exit 1;
./vendor/bin/sail artisan storage:link
