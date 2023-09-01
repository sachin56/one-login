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
        sh 'docker compose up'
      }
    }

  }
}