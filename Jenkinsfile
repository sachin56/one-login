pipeline {
  agent any
  stages {
    stage('Checkout Code') {
      steps {
        git(url: 'https://github.com/sachin56/one-login', branch: 'master')
      }
    }

    stage('show files') {
      parallel {
        stage('show files') {
          steps {
            sh 'ls -la'
          }
        }

        stage('composer up') {
          steps {
            sh 'cd one-login_master && docker compose up'
          }
        }

      }
    }

  }
}