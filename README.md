# Description
These manifests are used to deploy a LAMP stack on Kubernetes.

## TL;DR
```
git clone https://github.com/alijahnas/lamp-k8s
cd lamp-k8s
# The namespace before everything else
kubectl apply -f manifests/lamp-k8s-namespace.yaml
kubectl apply -f manifests
kubectl get all -n lamp-k8s
```

# More description
We have a deployment of PHP-FPM. Number of instances is configurable through deployment replicas.

We have a deployment of Apache webserver using FastCGI to connect to the PHP-FPM service. Number of instances is configurable through deployment replicas.

We have a deployment of a single MySQL database, with a persistent volume to store the DB.
