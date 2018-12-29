from rest_framework import serializers
from .models import Animal

class AnimalSerializer(serializers.ModelSerializer):
    class Meta:
        model = Animal
        fields = ('id', 'name', 'dob', 'gender', 
                'active', 'own', 'father', 'mother')

    def validate_father(self, father):
        if (father.gender != Animal.MALE):
            raise serializers.ValidationError('The father has to be male.')

    def validate_mother(self, mother):
        if (mother.gender != Animal.FEMALE):
            raise serializers.ValidationError('The mother has to be female.')

    def validate_dob(self, dob):
        father_id = self.context['request'].data['father']
        if (father_id):
            father = Animal.objects.get(pk = father_id)
            if (father and father.dob > dob):
                raise serializers.ValidationError('Animal can\'t be older than it\'s father')

        mother_id = self.context['request'].data['mother']
        if (mother_id):
            mother = Animal.objects.get(pk = mother_id)
            if (mother and mother.dob > dob):
                raise serializers.ValidationError('Animal can\'t be older than it\'s mother')
