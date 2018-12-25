from .models import Animal
from rest_framework import viewsets
from .serializers import AnimalSerializer

class AnimalView(viewsets.ModelViewSet):
    queryset = Animal.objects.all()
    serializer_class = AnimalSerializer