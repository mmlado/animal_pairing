from rest_framework import serializers
from .models import Animal

class AnimalSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Animal
        fields = ('id', 'name', 'dob', 'active', 'own')