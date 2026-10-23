def customContainerNamePHP8 = UUID.randomUUID().toString().replace("-", "");
def customContainerNamePHPLatest = UUID.randomUUID().toString().replace("-", "");
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
          sh "sed -i 's/pingback_php8/${customContainerNamePHP8}/g' docker-compose.yml"
          sh "sed -i 's/pingback_php_latest/${customContainerNamePHPLatest}/g' docker-compose.yml"
          sh "docker-compose up -d"
          sh "docker exec --tty ${customContainerNamePHP8} composer install"
          sh "docker exec --tty ${customContainerNamePHPLatest} composer install"
          sh 'sudo chown -R jenkins *'
        }
    }
    stage('Testing Laravel 13') {
        steps {
            sh "docker exec --tty ${customContainerNamePHP8} composer install"
            sh "docker exec --tty ${customContainerNamePHP8} composer test"
        }
    }
    stage('Testing PHP 8.5') {
        steps {
            sh "docker exec --tty ${customContainerNamePHPLatest} composer test"
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
