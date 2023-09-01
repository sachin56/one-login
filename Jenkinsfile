pipeline {
  agent any
  stages {
    stage('Checkout Code') {
      steps {
        git(url: 'https://github.com/sachin56/one-login', branch: 'master')
      }
    }

    stage('Docker Up') {
      steps {
        sh 'cd one-login_master && docker compose up'
      }
    }

  }
}