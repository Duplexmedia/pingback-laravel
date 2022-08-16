def customContainerNamePHP7 = UUID.randomUUID().toString().replace("-", "");
def customContainerNamePHP8 = UUID.randomUUID().toString().replace("-", "");
pipeline {
  agent any
  options {
      // This is required if you want to clean before build
      skipDefaultCheckout(true)
    }
  stages {
    stage('Build') {
      steps {
          sh 'sudo rm -rf *'
          // Clean before build
          checkout scm
          sh "sed -i 's/pingback_php7/${customContainerNamePHP7}/g' docker-compose.yml"
          sh "sed -i 's/pingback_php8/${customContainerNamePHP8}/g' docker-compose.yml"
          sh "docker-compose up -d"
          sh "docker exec --tty ${customContainerNamePHP7} composer install"
          sh 'sudo chown -R jenkins *'
        }
    }
    stage('Testing Laravel 6') {
        steps {
            sh "docker exec --tty ${customContainerNamePHP7} composer install"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove orchestra/testbench --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove laravel/framework"
            sh "docker exec --tty ${customContainerNamePHP7} composer require laravel/framework ^6"
            sh "docker exec --tty ${customContainerNamePHP7} composer require orchestra/testbench ^4 --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer test"
        }
    }
    stage('Testing Laravel 7') {
        steps {
            sh "docker exec --tty ${customContainerNamePHP7} composer install"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove orchestra/testbench --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove laravel/framework"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove phpunit/phpunit --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer require laravel/framework ^7"
            sh "docker exec --tty ${customContainerNamePHP7} composer require phpunit/phpunit ^8.4 --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer require orchestra/testbench ^5 --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer test"
        }
    }
    stage('Testing Laravel 8') {
        steps {
            sh "docker exec --tty ${customContainerNamePHP7} composer install"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove orchestra/testbench --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove laravel/framework"
            sh "docker exec --tty ${customContainerNamePHP7} composer remove phpunit/phpunit --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer require laravel/framework ^8"
            sh "docker exec --tty ${customContainerNamePHP7} composer require phpunit/phpunit ^8.4 --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer require orchestra/testbench ^6 --dev"
            sh "docker exec --tty ${customContainerNamePHP7} composer test"
        }
    }
    stage('Testing Laravel 9') {
        steps {
            sh "docker exec --tty ${customContainerNamePHP8} composer remove orchestra/testbench --dev"
            sh "docker exec --tty ${customContainerNamePHP8} composer remove phpunit/phpunit --dev"
            sh "docker exec --tty ${customContainerNamePHP8} composer remove laravel/framework"
            sh "docker exec --tty ${customContainerNamePHP8} composer require laravel/framework ^9"
            sh "docker exec --tty ${customContainerNamePHP8} composer require mockery/mockery ^1.5 --dev"
            sh "docker exec --tty ${customContainerNamePHP8} composer require orchestra/testbench ^7 --dev"
            sh "docker exec --tty ${customContainerNamePHP8} composer test"
        }
    }
  }
  post {
      always {
        sh 'docker-compose down --volumes'
        sh 'sudo rm -rf *'
      }
    }
}
