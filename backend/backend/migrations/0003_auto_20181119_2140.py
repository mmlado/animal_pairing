# Generated by Django 2.1.3 on 2018-11-19 20:40

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('backend', '0002_animal_gender'),
    ]

    operations = [
        migrations.AlterUniqueTogether(
            name='animal',
            unique_together={('name', 'dob')},
        ),
    ]
